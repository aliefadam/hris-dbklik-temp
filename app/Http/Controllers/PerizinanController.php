<?php

namespace App\Http\Controllers;

use App\Mail\NotifikasiEmail;
use App\Mail\NotifikasiEmailBalasan;
use App\Models\Izin;
use App\Models\Karyawan;
use App\Models\Notifikasi;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class PerizinanController extends Controller
{
    public function ajukanPerizinan(Request $request)
    {
        $namaFilePendukung = $request->file_pendukung;
        if ($request->hasFile("file_pendukung")) {
            $namaFilePendukung = auth()->user()->id;
            $namaFilePendukung .= "_" . date("Y-m-d_H-i-s");
            $extension = $request->file("file_pendukung")->extension();
            $namaFilePendukung = "$namaFilePendukung.$extension";
            File::move($request->file("file_pendukung")->path(), public_path("storage/upload/file_pendukung/$namaFilePendukung"));
        }

        Perizinan::create([
            "karyawan_id" => auth()->user()->karyawan->id,
            "izin_id" => $request->jenis_izin,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_akhir" => $request->tanggal_akhir,
            "catatan" => $request->catatan,
            "bukti_file" => $namaFilePendukung,
            "status" => "pending",
        ]);

        $penerimaNotif = Karyawan::where("jabatan_id", 3)->get();
        if (auth()->user()->karyawan->jabatan_id == 3) {
            $penerimaNotif = Karyawan::where("jabatan_id", auth()->user()->karyawan->jabatan_id - 1)->get();
        }

        foreach ($penerimaNotif as $penerima) {
            $pesan = [
                "id_pengaju" => auth()->user()->id,
                "judul" => "Pengajuan Izin Baru",
                "pesan" => "Perhatian, Ada pengajuan izin baru yang perlu diverifikasi. Mohon segera tinjau pengajuan tersebut untuk memastikan kelancaran proses persetujuan. Pengajuan izin baru ini mungkin membutuhkan perhatian Anda dalam waktu dekat. Terima kasih atas kerja sama Anda.",
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "divisi" => auth()->user()->karyawan->divisi->nama_divisi,
                "izin" => Izin::find($request->jenis_izin)->jenis_izin,
                "tanggal_izin" => $request->tanggal_mulai . " - " . $request->tanggal_akhir,
                "catatan" => $request->catatan ?? "-",
                "file_pendukung" => $namaFilePendukung ?? "-",
            ];
            Notifikasi::create([
                "karyawan_id" => $penerima->id,
                "tanggal_jam" => date("Y-m-d H-i-s"),
                "pesan" => json_encode($pesan),
                "status_dibaca" => false,
            ]);
            $dataEmail = [
                "subject" => "Pengajuan Izin Baru",
                "sender_name" => auth()->user()->email,
                "message" => [
                    "desc" => "Perhatian, Ada pengajuan izin baru yang perlu diverifikasi. Mohon segera tinjau pengajuan tersebut untuk memastikan kelancaran proses persetujuan. Pengajuan izin baru ini mungkin membutuhkan perhatian Anda dalam waktu dekat. Terima kasih atas kerja sama Anda.",
                    "nama" => auth()->user()->karyawan->nama_lengkap,
                    "divisi" => auth()->user()->karyawan->divisi->nama_divisi,
                    "izin" => Izin::find($request->jenis_izin)->jenis_izin,
                    "tanggal_izin" => $request->tanggal_mulai . " - " . $request->tanggal_akhir,
                    "catatan" => $request->catatan ?? "-",
                    "file_pendukung" => $namaFilePendukung ?? "-",
                ],
            ];
            // Mail::to($penerima->email)->send(new NotifikasiEmail($dataEmail));
        }

        return redirect()->back();
    }


    public function balasPerizinan(Request $request, Perizinan $perizinan)
    {
        $jabatanPenyetuju = Karyawan::find(auth()->user()->id)->jabatan->nama_jabatan;
        $divisiPenyetuju = Karyawan::find(auth()->user()->id)->divisi->nama_divisi;

        $perizinan->update([
            "feedback" => $request->feedback,
            "status" => $request->status,
            "disetujui_oleh" => "$jabatanPenyetuju - $divisiPenyetuju"
        ]);

        $penerimaNotif = $perizinan->karyawan->id;
        $penerimaEmail = $perizinan->karyawan->email;
        $pesan = [
            "judul" => $request->status == "disetujui" ? "Pengajuan Izin Diterima" : "Pengajuan Izin Ditolak",
            "pesan" => $request->status == "disetujui" ? "Selamat, pengajuan izin Anda telah disetujui. Kami ingin memberitahu Anda bahwa izin yang Anda ajukan telah diterima dan telah diresmikan. Terima kasih atas kerja sama Anda dalam mematuhi prosedur yang berlaku." : "Kami menghargai waktu dan usaha Anda dalam mengajukan izin. Setelah melalui pertimbangan yang cermat, kami harus menyampaikan bahwa pengajuan izin Anda tidak dapat kami setujui pada kesempatan ini. Keputusan ini diambil berdasarkan pedoman dan kriteria yang telah ditetapkan",
            "feedback" => $request->feedback,
        ];

        Notifikasi::create([
            "karyawan_id" => $penerimaNotif,
            "tanggal_jam" => date("Y-m-d H-i-s"),
            "pesan" => json_encode($pesan),
            "status_dibaca" => false,
        ]);

        $dataEmail = [
            "subject" => $request->status == "disetujui" ? "Pengajuan Izin Diterima" : "Pengajuan Izin Ditolak",
            "sender_name" => auth()->user()->email,
            "message" => [
                "desc" => $request->status == "disetujui" ? "Selamat, pengajuan izin Anda telah disetujui. Kami ingin memberitahu Anda bahwa izin yang Anda ajukan telah diterima dan telah diresmikan. Terima kasih atas kerja sama Anda dalam mematuhi prosedur yang berlaku." : "Kami menghargai waktu dan usaha Anda dalam mengajukan izin. Setelah melalui pertimbangan yang cermat, kami harus menyampaikan bahwa pengajuan izin Anda tidak dapat kami setujui pada kesempatan ini. Keputusan ini diambil berdasarkan pedoman dan kriteria yang telah ditetapkan",
                "feedback" => $request->feedback,
            ],
        ];

        // Mail::to($penerimaEmail)->send(new NotifikasiEmailBalasan($dataEmail));

        return redirect()->back();
    }

    public function tampilJumlahIzin(Request $request)
    {
        if ($request->id == 0) {
            $dataSemuaCabangHariIni = Perizinan::where("status", "disetujui")
                ->whereDate('tanggal_mulai', '<=', today())
                ->whereDate('tanggal_akhir', '>=', today())
                ->count();

            $dataSemuaCabangBulanIni = Perizinan::where('status', 'disetujui')
                ->whereMonth('tanggal_mulai', now()->month)
                ->whereYear('tanggal_mulai', now()->year)
                ->count();

            $dataYangDikirim = [
                "data_hari_ini" => $dataSemuaCabangHariIni,
                "data_bulan_ini" => $dataSemuaCabangBulanIni,
            ];
        } else {
            $dataCabangTertentuHariIni = Perizinan::where('status', 'disetujui')
                ->whereDate('tanggal_mulai', '<=', today())
                ->whereDate('tanggal_akhir', '>=', today())
                ->whereHas('karyawan', function ($query) use ($request) {
                    $query->where('cabang_id', $request->id);
                })->count();

            $dataCabangTertentuBulanIni = Perizinan::where('status', 'disetujui')
                ->whereMonth('tanggal_mulai', now()->month)
                ->whereYear('tanggal_mulai', now()->year)
                ->whereHas('karyawan', function ($query) use ($request) {
                    $query->where('cabang_id', $request->id);
                })->count();

            $dataYangDikirim = [
                "data_hari_ini" => $dataCabangTertentuHariIni,
                "data_bulan_ini" => $dataCabangTertentuBulanIni,
            ];
        }

        return response()->json($dataYangDikirim);
    }
}
