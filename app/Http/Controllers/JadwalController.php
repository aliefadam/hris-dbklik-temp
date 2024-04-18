<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function tambahJadwal(Request $request)
    {
        Jadwal::create([
            "tanggal" => $request->tanggal,
            "karyawan_id" => $request->karyawan_id,
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
