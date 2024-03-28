<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Perizinan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportPerizinan implements FromView
{
    protected $dataPerizinan;
    public function __construct($dataPerizinan)
    {
        $this->dataPerizinan = $dataPerizinan;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view("partials.table-daftar-pengajuan", [
            "data_perizinan" => $this->dataPerizinan,
            "tampil_catatan" => true,
        ]);
    }
}
