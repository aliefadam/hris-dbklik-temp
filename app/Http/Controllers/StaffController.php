<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengajuan;
use App\Models\Izin;
use App\Models\Notifikasi;
use App\Models\Perizinan;
use App\Models\Karyawan;
use App\Models\KontrolKatering;
use App\Models\MenuKatering;
use App\Models\PemesananKatering;
use App\Models\RulesHRD;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    public function index()
    {
        $user_divisi = auth()->user()->karyawan->divisi->id;
        $dataKaryawan = Karyawan::whereHas('divisi', function ($query) use ($user_divisi) {
            $query->where('id', $user_divisi);
        })->where("id", "!=", auth()->user()->id)->orderBy("jabatan_id", "ASC")->get()->map(function ($karyawan) {
            return [
                "id" => $karyawan->id,
                "nama" => $karyawan->nama_lengkap,
                "sub_divisi" => $karyawan->subDivisi->nama_sub_divisi ?? "",
                "jabatan" => $karyawan->jabatan->nama_jabatan,
                "foto" => $karyawan->foto,
            ];
        });

        $data_cuti = Perizinan::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_akhir', '>=', now())
            ->where('status', 'disetujui')
            ->pluck('karyawan_id');

        $kehadiran = $dataKaryawan->map(function ($karyawan) use ($data_cuti) {
            $hadir = in_array($karyawan['id'], $data_cuti->toArray());
            $karyawan['status'] = $hadir ? 'Tidak Hadir' : 'Hadir';
            return $karyawan;
        });

        return view('welcome', [
            "title" => "Beranda",
            "dataDiri" => [
                "id" => auth()->user()->karyawan->id,
                "foto" => auth()->user()->karyawan->foto,
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "divisi" => auth()->user()->karyawan->divisi->nama_divisi,
                "sub_divisi" => auth()->user()->karyawan->subDivisi->nama_sub_divisi,
                "jabatan" => auth()->user()->karyawan->jabatan->nama_jabatan,
                "cabang" => auth()->user()->karyawan->cabang->nama_cabang,
            ],
            "dataKaryawan" => $dataKaryawan,
            "data_cuti" => $data_cuti,
            "kehadiran" => $kehadiran
        ]);
    }

    public function formPerizinan()
    {
        $tanggalMasukKerja = Karyawan::find(auth()->user()->id)->tanggal_masuk_kerja;
        $tanggalSekarang = date("Y-m-d");
        $diffYears = date_diff(date_create($tanggalMasukKerja), date_create($tanggalSekarang))->y;
        $isOneYear = $diffYears >= 1;

        return view('perizinan', [
            "title" => "Perizinan",
            "jenis_izin" => Izin::all(),
            "rulesHRD" => RulesHRD::all(),
            "jatah_cuti" => $isOneYear ? 6 - Perizinan::where("karyawan_id", auth()->user()->id)
                ->where("status", "disetujui")
                ->where("izin_id", "1")
                ->whereYear("tanggal_mulai", date("Y"))
                ->count() : 0,
        ]);
    }

    public function riwayat(Request $request)
    {
        if ($request->s == "") {
            $dataRiwayat = Perizinan::where("karyawan_id", auth()->user()->karyawan->id)
                ->orderBy("updated_at", "DESC")
                ->get();
        } else {
            $mulai = $request->s;
            $akhir = $request->e;
            $dataRiwayat = Perizinan::where("karyawan_id", auth()->user()->karyawan->id)
                ->whereBetween("tanggal_mulai", [$mulai, $akhir])
                ->orderBy("updated_at", "DESC")
                ->get();
        }

        return view('riwayat', [
            "riwayat" => $dataRiwayat,
            "title" => "Riwayat",
            "mulai" => isset($mulai) ? $mulai : null,
            "akhir" => isset($akhir) ? $akhir : null,
        ]);
    }

    public function strukturPegawai()
    {
        return view('struktur_pegawai', [
            "data_pegawai" => Karyawan::where("divisi_id", auth()->user()->karyawan->divisi_id)
                ->get(),
            "jabatan_id" => auth()->user()->karyawan->jabatan_id,
            "diatas_satu_level" => auth()->user()->karyawan->jabatan_id - 1,
            "title" => "Struktur Pegawai",
        ]);
    }

    public function katering()
    {
        $data_tanggal_awal = MenuKatering::where("hari", "Senin")->orderBy("id", "DESC")->first()->tanggal ?? "";
        $data_tanggal_akhir = MenuKatering::where("hari", "Sabtu")->orderBy("id", "DESC")->first()->tanggal ?? "";

        $status = KontrolKatering::find(1)->status;
        $batas_akhir = KontrolKatering::find(1)->batas_akhir;
        if ($status == "Aktif") {
            if (date("Y-m-d H:i:s") > $batas_akhir) {
                KontrolKatering::find(1)->update([
                    "status" => "Non Aktif",
                    "batas_akhir" => null,
                ]);
                return redirect()->back();
            }
        }

        return view("katering", [
            "title" => "Katering",
            "apakah_katering_aktif" => KontrolKatering::find(1)->status == "Aktif" ? true : false,
            "apakah_sudah_mengisi" => PemesananKatering::whereBetween("tanggal", [$data_tanggal_awal, $data_tanggal_akhir])
                ->whereHas("karyawan", function ($query) {
                    $query->where("id", auth()->user()->id);
                })->count() > 0 ? true : false,
            "data_tanggal_awal" => $data_tanggal_awal,
            "data_tanggal_akhir" => $data_tanggal_akhir,
            "batas_akhir" => KontrolKatering::find(1)->batas_akhir,
            "menu_katering" => MenuKatering::latest()->limit(6)->get(),
        ]);
    }

    public function gantiPassword()
    {
        return view("ganti_password", [
            "title" => "Ganti Password",
        ]);
    }

    public function simpanPasswordBaru(Request $request)
    {
        $kataSandiLama = $request->kata_sandi_lama;
        $kataSandiBaru = $request->kata_sandi_baru;
        $konfirmasiKataSandiBaru = $request->konfirmasi_kata_sandi_baru;

        if (password_verify($kataSandiLama, auth()->user()->password)) {
            if ($kataSandiBaru == $konfirmasiKataSandiBaru) {
                $user = User::find(auth()->user()->id);
                $user->update([
                    "password" => $kataSandiBaru,
                ]);
                return redirect()->back()->with("pesan", [
                    "jenis" => "berhasil",
                    "body" => "Berhasil Mengganti Kata Sandi",
                ]);
            } else {
                return redirect()->back()->with("pesan", [
                    "jenis" => "gagal",
                    "body" => "Konfirmasi Kata Sandi Tidak Cocok",
                ]);
            }
        } else {
            return redirect()->back()->with("pesan", [
                "jenis" => "gagal",
                "body" => "Kata Sandi Lama Tidak Cocok",
            ]);
        }
    }

    public function notification()
    {
        return view("notification", [
            "title" => "Notifikasi",
            "data_notifikasi" => Notifikasi::where("karyawan_id", auth()->user()->id)->orderBy("id", "DESC")->get(),
        ]);
    }

    public function notificationSelected(Notifikasi $notifikasi)
    {
        $notifikasi->update(["status_dibaca" => true]);
        return redirect("/notification")->with("selected_notifikasi", $notifikasi);
    }

    public function profile()
    {
        return view("profile", [
            "title" => "Profil",
            "dataDiri" => [
                "foto" => auth()->user()->karyawan->foto,
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "email" => auth()->user()->karyawan->email,
                "no_telephone" => auth()->user()->karyawan->no_telephone,
                "no_whatsapp" => auth()->user()->karyawan->no_whatsapp,
                "alamat" => auth()->user()->karyawan->alamat_domisili,
                "tanggal_mulai_kontrak" => auth()->user()->karyawan->tanggal_masuk_kerja,
                "tanggal_akhir_kontrak" => auth()->user()->karyawan->berakhir_kerja,
                "no_rekening" => auth()->user()->karyawan->no_rekening_bca,
                "divisi" => auth()->user()->karyawan->divisi->nama_divisi,
                "sub_divisi" => auth()->user()->karyawan->subDivisi->nama_sub_divisi,
                "jabatan" => auth()->user()->karyawan->jabatan->nama_jabatan,
                "cabang" => auth()->user()->karyawan->cabang->nama_cabang,
                "agama" => auth()->user()->karyawan->agama,
            ],
        ]);
    }

    public function editFoto(Request $request)
    {
        $foto = $request->file("edit_foto");
        $ekstensi = $foto->extension();
        $namaUser = strtolower(auth()->user()->karyawan->nama_lengkap);
        $tanggalJam = date("Y-m-d-H-i-s");
        $namaFotoBaru = "$namaUser-profile-$tanggalJam.$ekstensi";

        $fotoLama = auth()->user()->karyawan->foto;
        if ($fotoLama != null) {
            File::delete("storage/upload/foto_user/$fotoLama");
        }

        Karyawan::find(auth()->user()->id)->update([
            "foto" => $namaFotoBaru,
        ]);
        $foto->storeAs("public/upload/foto_user", $namaFotoBaru);

        return redirect()->back();
    }
}
