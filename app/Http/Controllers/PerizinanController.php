<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\Karyawan;
use App\Models\Notifikasi;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            File::move($request->file("file_pendukung")->path(), public_path("upload/file_pendukung/$namaFilePendukung"));
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
        foreach ($penerimaNotif as $penerima) {
            $pesan = [
                "judul" => "Pengajuan Izin Baru",
                "pesan" => "Perhatian, Ada pengajuan izin baru yang perlu diverifikasi. Mohon segera tinjau pengajuan tersebut untuk memastikan kelancaran proses persetujuan. Pengajuan izin baru ini mungkin membutuhkan perhatian Anda dalam waktu dekat. Terima kasih atas kerja sama Anda.",
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "divisi" => auth()->user()->karyawan->subDivisi->divisi->nama_divisi,
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
        }

        return redirect()->back();
    }

    public function balasPerizinan(Request $request, Perizinan $perizinan)
    {
        $perizinan->update([
            "feedback" => $request->feedback,
            "status" => $request->status
        ]);

        $penerimaNotif = $perizinan->karyawan->id;
        $pesan = [
            "judul" => "Pengajuan Izin Diterima",
            "pesan" => "Selamat, pengajuan izin Anda telah disetujui. Kami ingin memberitahu Anda bahwa izin yang Anda ajukan telah diterima dan telah diresmikan. Terima kasih atas kerja sama Anda dalam mematuhi prosedur yang berlaku.",
            "feedback" => $request->feedback,
        ];

        Notifikasi::create([
            "karyawan_id" => $penerimaNotif,
            "tanggal_jam" => date("Y-m-d H-i-s"),
            "pesan" => json_encode($pesan),
            "status_dibaca" => false,
        ]);

        return redirect()->back();
    }
}
