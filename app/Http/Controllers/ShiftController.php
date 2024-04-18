<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function tambahShift(Request $request)
    {
        Shift::create([
            "shift" => $request->shift,
            "jam_mulai_id" => $request->jam_mulai,
            "jam_akhir_id" => $request->jam_akhir,
        ]);
        return redirect()->back();
    }

    public function editShift(Request $request, Shift $shift)
    {
        $shift->update([
            "shift" => $request->shift,
            "jam_mulai_id" => $request->jam_mulai,
            "jam_akhir_id" => $request->jam_akhir,
        ]);
        return redirect()->back();
    }

    public function hapusShift(Shift $shift)
    {
        $shift->delete();
        return redirect()->back();
    }
}
