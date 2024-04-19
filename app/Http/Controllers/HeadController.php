<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengajuan;
use App\Models\Izin;
use App\Models\Karyawan;
use App\Models\KeyPerformanceIndicator;
use App\Models\KontrolKatering;
use App\Models\MenuKatering;
use App\Models\Notifikasi;
use App\Models\PemesananKatering;
use App\Models\Perizinan;
use App\Models\RulesHRD;
use App\Models\User;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function welcome()
    {
        $user_divisi = auth()->user()->karyawan->divisi->id;
        $dataKaryawan = Karyawan::whereHas('divisi', function ($query) use ($user_divisi) {
            $query->where('id', $user_divisi);
        })->where("id", "!=", auth()->user()->id)->get()->map(function ($karyawan) {
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

        return view('head.welcome', [
            "title" => "Beranda",
            "dataDiri" => [
                "foto" => auth()->user()->karyawan->foto,
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "divisi" => auth()->user()->karyawan->divisi->nama_divisi,
                "sub_divisi" => auth()->user()->karyawan->subDivisi->nama_sub_divisi ?? "",
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

        return view('head.perizinan', [
            "title" => "Perizinan",
            "jenis_izin" => Izin::all(),
            "rulesHRD" => RulesHRD::all(),
            "jatah_cuti" => $isOneYear ? 6 - Perizinan::where("karyawan_id", auth()->user()->id)
                ->where("status", "disetujui")
                ->where("izin_id", "1")
                ->whereYear("tanggal_mulai", date("Y"))
                ->count() : 0
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

        return view('head.riwayat', [
            "riwayat" => $dataRiwayat,
            "title" => "Riwayat",
            "mulai" => isset($mulai) ? $mulai : null,
            "akhir" => isset($akhir) ? $akhir : null,
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

        return view("head.katering", [
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

    public function pengisianKPI()
    {
        $user_jabatan = auth()->user()->karyawan->jabatan_id;
        return view("head.pengisian-kpi", [
            "data_karyawan" => Karyawan::where("divisi_id", auth()->user()->karyawan->divisi_id)
                ->where("jabatan_id", $user_jabatan + 1)
                ->get(),
            "data_kpi" => KeyPerformanceIndicator::whereMonth("periode", date("m"))->get(),
            "title" => "Penilaian KPI",
        ]);
    }

    public function simpanKPI()
    {
        $dataKaryawan = Karyawan::where("divisi_id", auth()->user()->karyawan->divisi_id)
            ->where("jabatan_id", auth()->user()->karyawan->jabatan_id + 1)
            ->get();

        $bulan_yang_sama = KeyPerformanceIndicator::whereMonth("periode", date("m"))->count() > 0 ? true : false;


        foreach ($dataKaryawan as $karyawan) {
            if ($bulan_yang_sama) {
                KeyPerformanceIndicator::whereMonth("periode", date("m"))->where("karyawan_id", $karyawan->id)->update([
                    "karyawan_id" => $karyawan->id,
                    "nilai" => request("nilai_$karyawan->id"),
                    "apresiasi" => request("apresiasi_$karyawan->id") == "on" ?? true,
                    "periode" => today(),
                    "kedisiplinan" => request("kedisiplinan_$karyawan->id")/100,
                ]);
            } else {
                KeyPerformanceIndicator::create([
                    "karyawan_id" => $karyawan->id,
                    "nilai" => request("nilai_$karyawan->id"),
                    "apresiasi" => request("apresiasi_$karyawan->id") == "on" ?? true,
                    "periode" => today(),
                    "kedisiplinan" => request("kedisiplinan_$karyawan->id")/100,
                ]);
            }
        }

        return redirect()->back();
    }

    public function strukturPegawai()
    {
        return view('head.struktur_pegawai', [
            "data_pegawai" => Karyawan::where("divisi_id", auth()->user()->karyawan->divisi_id)
                ->get(),
            "jabatan_id" => auth()->user()->karyawan->jabatan_id,
            "diatas_satu_level" => auth()->user()->karyawan->jabatan_id - 1,
            "title" => "Struktur Pegawai",
        ]);
    }

    public function daftarPengajuan(Request $request)
    {
        if ($request->s == "") {
            $dataPerizinan = Perizinan::whereHas("karyawan", function ($query) {
                $query->where("divisi_id", auth()->user()->karyawan->divisi_id);
            })->whereHas("karyawan", function ($query) {
                $query->where("jabatan_id", ">", auth()->user()->karyawan->jabatan_id);
            })->orderBy("updated_at", "DESC")->get();
        } else {
            $mulai = $request->s;
            $akhir = $request->e;
            $dataPerizinan = Perizinan::whereBetween("tanggal_mulai", [$mulai, $akhir])
                ->whereHas("karyawan", function ($query) {
                    $query->where("divisi_id", auth()->user()->karyawan->divisi_id);
                })->whereHas("karyawan", function ($query) {
                    $query->where("jabatan_id", ">", auth()->user()->karyawan->jabatan_id);
                })->orderBy("updated_at", "DESC")->get();
        }

        return view('head.daftar-pengajuan', [
            "data_perizinan" => $dataPerizinan,
            "title" => "Daftar Pengajuan",
            "mulai" => isset($mulai) ? $mulai : null,
            "akhir" => isset($akhir) ? $akhir : null,
        ]);
    }

    public function notification(Request $request)
    {

        return view('head.notification', [
            "title" => "Notifikasi",
            "data_notifikasi" => Notifikasi::where("karyawan_id", auth()->user()->id)->orderBy("id", "DESC")->get(),
        ]);
    }

    public function notificationSelected(Notifikasi $notifikasi)
    {
        $notifikasi->update(["status_dibaca" => true]);
        return redirect("/head/notification")->with("selected_notifikasi", $notifikasi);
    }

    public function profile()
    {
        return view('head.profile', [
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
                "sub_divisi" => auth()->user()->karyawan->subDivisi->nama_sub_divisi ?? "",
                "jabatan" => auth()->user()->karyawan->jabatan->nama_jabatan,
                "cabang" => auth()->user()->karyawan->cabang->nama_cabang,
                "agama" => auth()->user()->karyawan->agama,
            ],
        ]);
    }

    public function gantiPassword()
    {
        return view('head.ganti_password', ["title" => "Ganti Password"]);
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
}
