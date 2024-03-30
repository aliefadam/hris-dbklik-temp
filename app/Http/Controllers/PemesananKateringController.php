<?php

namespace App\Http\Controllers;

use App\Models\MenuKatering;
use App\Models\PemesananKatering;
use Illuminate\Http\Request;

class PemesananKateringController extends Controller
{
    public function pesanKatering(Request $request)
    {
        $hariKatering = MenuKatering::all();
        $karyawanId = auth()->user()->id;

        foreach ($hariKatering as $katering) {
            $dataPemesananKatering = [
                "karyawan_id" => $karyawanId,
                "menu_id" => $katering->id,
                "setuju" => request("$katering->hari") == "true" ? true : false,
                "request" => request("$katering->hari-isi-request"),
            ];
            PemesananKatering::create($dataPemesananKatering);
            // dump($dataPemesananKatering);
        }
        // exit;

        return redirect()->back();
    }
}
