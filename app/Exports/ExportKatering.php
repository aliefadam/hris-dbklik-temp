<?php

namespace App\Exports;

use App\Models\MenuKatering;
use App\Models\PemesananKatering;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportKatering implements FromView
{
    protected $dataMenu;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($dataMenu)
    {
        $this->dataMenu = $dataMenu;
    }
    public function view(): View
    {
        return view("partials.table-daftar-pesanan-katering", [
            "data_menu" => $this->dataMenu,
            "data_katering" => PemesananKatering::all(),
            "export" => true,
        ]);
    }
}
