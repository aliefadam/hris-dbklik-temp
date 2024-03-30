<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembur;
use Carbon\Carbon;

class LemburController extends Controller
{
    public function lembur(Request $request)
    {
        $jamMulai = Carbon::createFromFormat('H:i', $request->jam_mulai);
        $jamSelesai = Carbon::createFromFormat('H:i', $request->jam_selesai);

        $selisihJam = $jamMulai->diffInHours($jamSelesai);
        $selisihMenit = $jamMulai->diffInMinutes($jamSelesai) % 60;

        Lembur::create([
            "karyawan_id" => $request->karyawan_id,
            "tanggal" => $request->tanggal,
            "keperluan" => $request->keperluan,
            "jam_mulai" => $request->jam_mulai,
            "jam_selesai" => $request->jam_selesai,
            "jumlah_jam_menit" => $selisihJam . " : " . $selisihMenit,
            "catatan" => $request->catatan,
        ]);

        return redirect()->back();
    }
}
