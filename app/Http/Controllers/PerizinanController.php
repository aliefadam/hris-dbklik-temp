<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    public function ajukanPerizinan(Request $request)
    {
        Perizinan::create([
            "karyawan_id" => auth()->user()->karyawan->id,
            "izin_id" => $request->jenis_izin,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_akhir" => $request->tanggal_akhir,
            "catatan" => $request->catatan,
            "bukti_file" => $request->file_pendukung,
            "status" => "pending",
        ]);
        return redirect()->back();
    }

    public function balasPerizinan(Request $request, Perizinan $perizinan)
    {
        $perizinan->update([
            "feedback" => $request->feedback,
            "status" => $request->status
        ]);
        return redirect()->back();
    }
}
