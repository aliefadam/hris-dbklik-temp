<?php

namespace App\Http\Controllers;

use App\Models\RulesHRD;
use Illuminate\Http\Request;

class RulesHRDController extends Controller
{
    public function tambahAturan(Request $request)
    {
        $data = [
            "judul" => $request->judul,
            "aturan" => $request->aturan,
        ];

        RulesHRD::create($data);
        return redirect()->back();
    }

    public function editAturan(RulesHRD $aturan, Request $request)
    {
        $aturan->update([
            "judul" => $request->judul,
            "aturan" => $request->aturan,
        ]);
    }

    public function hapusAturan(RulesHRD $aturan)
    {
        $aturan->delete();
    }
}
