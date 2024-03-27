<?php

namespace App\Http\Controllers;

use App\Exports\ExportPerizinan;
use App\Models\DaftarPengajuan;
use App\Models\Izin;
use App\Models\Karyawan;
use App\Models\Notifikasi;
use App\Models\Perizinan;
use App\Models\RulesHRD;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\MenuKatering;
use App\Models\SubDivisi;
use App\Models\Mutasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class HRController extends Controller
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

        return view('hr.welcome', [
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

        return view('hr.perizinan', [
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

        return view('hr.riwayat', [
            "riwayat" => $dataRiwayat,
            "title" => "Riwayat",
            "mulai" => isset($mulai) ? $mulai : null,
            "akhir" => isset($akhir) ? $akhir : null,
        ]);
    }

    public function katering()
    {
        return view("hr.katering", [
            "title" => "Katering",
        ]);
    }

    public function editKatering()
    {
        return view("hr.edit-katering", [
            "title" => "Edit Menu",
            "data_menu" => MenuKatering::all(),
        ]);
    }

    public function ubahKatering(Request $request)
    {

        MenuKatering::where("hari", "Senin")->update(["menu" => $request->Senin]);
        MenuKatering::where("hari", "Selasa")->update(["menu" => $request->Selasa]);
        MenuKatering::where("hari", "Rabu")->update(["menu" => $request->Rabu]);
        MenuKatering::where("hari", "Kamis")->update(["menu" => $request->Kamis]);
        MenuKatering::where("hari", "Jumat")->update(["menu" => $request->Jumat]);
        MenuKatering::where("hari", "Sabtu")->update(["menu" => $request->Sabtu]);

        return redirect()->back();
    }

    public function strukturPegawai()
    {
        return view('hr.struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
        ]);
    }

    public function daftarPengajuan(Request $request)
    {
        if ($request->s == "") {
            $dataPerizinan = Perizinan::where("karyawan_id", "!=", auth()->user()->id)
                ->orWhere(function ($query) {
                    $query->where("karyawan_id", auth()->user()->id)
                        ->where("status", "disetujui")
                        ->orWhere("status", "ditolak");
                })
                ->orderBy("updated_at", "DESC")
                ->get();
        } else {
            $mulai = $request->s;
            $akhir = $request->e;
            $dataPerizinan = Perizinan::whereBetween("tanggal_mulai", [$mulai, $akhir])
                ->where(function ($queryy) {
                    $queryy->where("karyawan_id", "!=", auth()->user()->id)
                        ->orWhere(function ($query) {
                            $query->where("karyawan_id", auth()->user()->id)
                                ->where("status", "disetujui")
                                ->orWhere("status", "ditolak");
                        });
                })
                // ->where("karyawan_id", "!=", auth()->user()->id)
                // ->orWhere(function ($query) {
                //     $query->where("karyawan_id", auth()->user()->id)
                //         ->where("status", "disetujui")
                //         ->orWhere("status", "ditolak");
                // })
                ->orderBy("updated_at", "DESC")
                ->get();
        }

        return view('hr.daftar-pengajuan', [
            "data_perizinan" => $dataPerizinan,
            "tampil_catatan" => false,
            "title" => "Daftar Pengajuan",
            "mulai" => isset($mulai) ? $mulai : null,
            "akhir" => isset($akhir) ? $akhir : null,
        ]);
    }

    public function exportExcel($s, $e)
    {
        $dataPerizinan = null;
        if ($s == "all") {
            $dataPerizinan = Perizinan::where("karyawan_id", "!=", auth()->user()->id)
                ->orWhere(function ($query) {
                    $query->where("karyawan_id", auth()->user()->id)
                        ->where("status", "disetujui")
                        ->orWhere("status", "ditolak");
                })
                ->orderBy("updated_at", "DESC")
                ->get();
        } else {
            $mulai = $s;
            $akhir = $e;
            $dataPerizinan = Perizinan::whereBetween("tanggal_mulai", [$mulai, $akhir])
                ->where(function ($queryy) {
                    $queryy->where("karyawan_id", "!=", auth()->user()->id)
                        ->orWhere(function ($query) {
                            $query->where("karyawan_id", auth()->user()->id)
                                ->where("status", "disetujui")
                                ->orWhere("status", "ditolak");
                        });
                })
                ->orderBy("updated_at", "DESC")
                ->get();
        }

        return Excel::download(new ExportPerizinan($dataPerizinan), "data-perizinan.xlsx");
    }

    public function daftarKaryawan()
    {
        return view('hr.daftar-karyawan', [
            "data_karyawan" => Karyawan::where("jabatan_id", "!=", "1")
                ->where("status_karyawan", "!=", "resign")
                ->get(),
            "title" => "Daftar Karyawan",
        ]);
    }

    public function biodata(Karyawan $karyawan)
    {
        if ($karyawan->sub_divisi_id == null) {
            $biodata = Karyawan::select('divisis.nama_divisi', "jabatans.nama_jabatan", 'karyawans.*', "cabangs.nama_cabang")
                ->join("divisis", "divisis.id", "=", "karyawans.divisi_id")
                ->join("cabangs", "cabangs.id", "=", "karyawans.cabang_id")
                ->join("jabatans", "jabatans.id", "=", "karyawans.jabatan_id")
                ->where("karyawans.id", $karyawan->id)
                ->get();
        } else {
            $biodata = Karyawan::select('divisis.nama_divisi', 'sub_divisis.nama_sub_divisi', "jabatans.nama_jabatan", 'karyawans.*', "cabangs.nama_cabang")
                ->join("divisis", "divisis.id", "=", "karyawans.divisi_id")
                ->join("cabangs", "cabangs.id", "=", "karyawans.cabang_id")
                ->join("jabatans", "jabatans.id", "=", "karyawans.jabatan_id")
                ->join("sub_divisis", "sub_divisis.id", "=", "karyawans.sub_divisi_id")
                ->where("karyawans.id", $karyawan->id)
                ->get();
        }

        $tanggalMasukKerja = $karyawan->tanggal_masuk_kerja;
        $tanggalSekarang = date("Y-m-d");
        $diffYears = date_diff(date_create($tanggalMasukKerja), date_create($tanggalSekarang))->y;
        $isOneYear = $diffYears >= 1;

        return view('hr.karyawan-detail', [
            "karyawan" => $karyawan,
            "biodata" => $biodata[0],
            "jabatan" => Jabatan::all(),
            "title" => "Detail Karyawan",
            "data_mutasi" => Mutasi::all(),
            "jatah_cuti" => $isOneYear ? 6 - Perizinan::where("karyawan_id", $karyawan->id)
                ->where("status", "disetujui")
                ->where("izin_id", 1)
                ->whereYear("tanggal_mulai", date("Y"))
                ->count() : 0,
        ]);
    }

    public function notification()
    {
        return view('hr.notification', [
            "title" => "Notifikasi",
            "data_notifikasi" => Notifikasi::where("karyawan_id", auth()->user()->id)
                ->orderBy("id", "DESC")
                ->get(),
        ]);
    }

    public function notificationSelected(Notifikasi $notifikasi)
    {
        $notifikasi->update(["status_dibaca" => true]);
        return redirect("/hr/notification")->with("selected_notifikasi", $notifikasi);
    }

    public function profile()
    {
        return view('hr.profile', [
            "title" => "Profil",
            "dataDiri" => [
                "foto" => auth()->user()->karyawan->foto,
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "jenis_kelamin" => auth()->user()->karyawan->jenis_kelamin,
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
        File::move($foto->path(), public_path("storage/upload/foto_user/$namaFotoBaru"));

        return redirect()->back();
    }

    public function gantiPassword()
    {
        return view('hr.ganti_password', ["title" => "Ganti Password"]);
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
    public function updateCatatan(Request $request)
    {
        $karyawan_id = $request->karyawan_id;
        $karyawan = Karyawan::find($karyawan_id);
        $karyawan->update([
            "catatan" => $request->catatan
        ]);

        return redirect()->back();
    }


    public function updateKontrak(Request $request)
    {
        $karyawan_id = $request->karyawan_id;
        $karyawan = Karyawan::find($karyawan_id);
        $durasi = (int)$request->durasi;
        $tanggal_akhir_kontrak = Carbon::parse($karyawan->berakhir_kerja)->addMonths($durasi);

        $tanggal_masuk_kerja = Carbon::parse($karyawan->tanggal_masuk_kerja);
        $tanggal_berakhir_kerja = Carbon::parse($request->tanggal_akhir_kontrak_baru)->toDateTime();
        $selisih = $tanggal_masuk_kerja->diffInMonths($tanggal_berakhir_kerja);

        if ($selisih > 12) {
            if ($selisih % 12 !== 0) {
                $range_kontrak = floor($selisih / 12) . " tahun " . $selisih % 12 . " bulan";
            } else {
                $range_kontrak = floor($selisih / 12) . " tahun";
            }
        } else {
            $range_kontrak = $selisih . " bulan";
        }

        if ($request->durasi != "tetap") {
            $karyawan->update([
                "range_kontrak" => $range_kontrak,
                "berakhir_kerja" => $tanggal_akhir_kontrak
            ]);
        } else {
            $karyawan->update([
                "berakhir_kerja" => null,
                "range_kontrak" => null,
                "status_karyawan" => "Karyawan Tetap"
            ]);
        }


        return redirect()->back();
    }

    public function kontrak(Request $request)
    {
        $karyawan_id = $request->karyawan_id;
        $karyawan = Karyawan::find($karyawan_id);
        if ($request->durasi != "tetap") {
            $durasi = (int)$request->durasi;
            $tanggalBaru = Carbon::parse($karyawan->berakhir_kerja)->addMonths($durasi);
            $tanggalBaru = Carbon::parse($tanggalBaru)->format('d M Y');
        } else {
            $tanggalBaru = 'Karyawan Tetap';
        };

        $dataYangDikirim = [
            "tanggal_baru" => $tanggalBaru
        ];

        return response($dataYangDikirim);
    }

    public function mutasi(Request $request)
    {
        $jenisMutasi = $request->jenis_mutasi;
        $karyawan = Karyawan::find($request->karyawan_id);

        if ($jenisMutasi == "pindah-cabang") {
            $awal = $karyawan->cabang->nama_cabang;
            $akhir = Cabang::all();
            $dataYangDikirim = [
                "awal" => $awal,
                "akhir" => $akhir,
                "jenis_mutasi" => $jenisMutasi,
            ];
        } else if ($jenisMutasi == "pindah-divisi") {
            $awal = $karyawan->divisi->nama_divisi;
            $akhir = Divisi::all();
            $dataYangDikirim = [
                "awal" => $awal,
                "akhir" => $akhir,
                "jenis_mutasi" => $jenisMutasi,
            ];
        } else if ($jenisMutasi == "pindah-sub-divisi") {
            $awal = $karyawan->subDivisi->nama_sub_divisi;
            $akhir = SubDivisi::all();
            $dataYangDikirim = [
                "awal" => $awal,
                "akhir" => $akhir,
                "jenis_mutasi" => $jenisMutasi,
            ];
        } else if ($jenisMutasi == "pindah-jabatan") {
            $awal = $karyawan->jabatan->nama_jabatan;
            $akhir = Jabatan::all();
            $dataYangDikirim = [
                "awal" => $awal,
                "akhir" => $akhir,
                "jenis_mutasi" => $jenisMutasi,
            ];
        }

        return response()->json($dataYangDikirim);
    }

    public function tambahMutasi(Request $request)
    {
        $namaFilePendukung = auth()->user()->id;
        $namaFilePendukung .= "_" . date("Y-m-d_H-i-s");
        $extension = $request->file("surat_mutasi")->extension();
        $namaFilePendukung = "$namaFilePendukung.$extension";
        File::move($request->file("surat_mutasi")->path(), public_path("/storage/upload/file_pendukung/$namaFilePendukung"));
        $karyawan = Karyawan::find($request->karyawan_id);

        Mutasi::create([
            "karyawan_id" => $karyawan->id,
            "jenis_mutasi" => $request->jenis_mutasi,
            "awal" => $request->awal,
            "tujuan" => $request->tujuanString,
            "surat_mutasi_file" => $namaFilePendukung,
        ]);

        $jenisMutasi = $request->jenis_mutasi;
        $kolomUserUpdate = explode("-", $jenisMutasi)[1];
        $kolomUserUpdate .= "_id";
        $karyawan->update([
            $kolomUserUpdate => $request->tujuan
        ]);

        return redirect()->back();
    }

    public function editProfileKaryawan(Request $request, Karyawan $karyawan)
    {
        if ($karyawan->email !== $request->email) {
            User::find($karyawan->id)->update(["email" => $request->email]);
        }

        $karyawan->update([
            "email" => $request->email,
            "alamat_domisili" => $request->alamat_domisili,
            "no_telephone" => $request->no_telephone,
            "no_whatsapp" => $request->no_whatsapp,
            "status_pernikahan" => $request->status_pernikahan,
            "no_bpjs_kes" => $request->no_bpjs_kes,
            "no_bpjs_ktk" => $request->no_bpjs_ktk,
            "kontak_darurat" => $request->kontak_darurat,
            "inventaris_kantor" => $request->inventaris_kantor,
        ]);


        return redirect()->back();
    }
}
