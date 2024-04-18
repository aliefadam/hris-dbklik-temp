<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    public function tambahJam(Request $request)
    {
        Jam::create([
            "jam" => $request->jam,
        ]);
        return redirect()->back();
    }

    public function editJam(Request $request, Jam $jam)
    {
        $jam->update([
            "jam" => $request->jam,
        ]);
        return redirect()->back();
    }

    public function hapusJam(Jam $jam)
    {
        $jam->delete();
        return redirect()->back();
    }
}
