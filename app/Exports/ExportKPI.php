<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportKPI implements FromView
{

    protected $data_kpi = null;
    public function __construct($data_kpi)
    {
        $this->data_kpi = $data_kpi;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view("partials.table-penilaian-kpi", ["data_kpi" => $this->data_kpi]);
    }
}
