<?php

namespace App\Http\Controllers;

use App\Models\MenuKatering;
use App\Models\PemesananKatering;
use Illuminate\Http\Request;

class PemesananKateringController extends Controller
{
    public function pesanKatering(Request $request)
    {
        $data_tanggal_awal = MenuKatering::where("hari", "Senin")->orderBy("id", "DESC")->first()->tanggal ?? "";
        $data_tanggal_akhir = MenuKatering::where("hari", "Sabtu")->orderBy("id", "DESC")->first()->tanggal ?? "";

        $dataMenu = MenuKatering::whereBetween("tanggal", [$data_tanggal_awal, $data_tanggal_akhir])
            ->get();
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
