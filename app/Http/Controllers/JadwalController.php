<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function tambahJadwal(Request $request)
    {
        $karyawan_id = Karyawan::where("nama_lengkap", explode("-", $request->karyawan)[0])->first()->id;
        Jadwal::create([
            "karyawan_id" => $karyawan_id,
            "periode_awal" => $request->periode_awal,
            "periode_akhir" => $request->periode_akhir,
            "shift_id" => $request->shift_id,
        ]);
        return redirect()->back();
    }

    public function editjadwal(Request $request, Jadwal $jadwal)
    {
        $jadwal->update([
            "jadwal" => $request->jadwal,
            "jam_mulai_id" => $request->jam_mulai,
            "jam_akhir_id" => $request->jam_akhir,
        ]);
        return redirect()->back();
    }

    public function hapusjadwal(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->back();
    }
}
