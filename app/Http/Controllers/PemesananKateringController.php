<?php

namespace App\Http\Controllers;

use App\Models\MenuKatering;
use App\Models\PemesananKatering;
use Illuminate\Http\Request;

class PemesananKateringController extends Controller
{
    public function pesanKatering(Request $request)
    {
        $dataMenu = MenuKatering::all();
        foreach ($dataMenu as $menu) {
            // dump([
            //     "karyawan_id" => auth()->user()->id,
            //     "hari" => $menu->hari,
            //     "tanggal" => $menu->tanggal,
            //     "menu" => MenuKatering::where("hari", $menu->hari)->first()->menu,
            //     "setuju" => request("$menu->hari"),
            //     "request" => request("$menu->hari-isi-request"),
            // ]);

            PemesananKatering::create([
                "karyawan_id" => auth()->user()->id,
                "hari" => $menu->hari,
                "tanggal" => $menu->tanggal,
                "menu" => MenuKatering::where("hari", $menu->hari)->first()->menu,
                "setuju" => request("$menu->hari"),
                "request" => request("$menu->hari-isi-request"),
            ]);
        }
        return redirect()->back();
    }
}
