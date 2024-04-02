<?php

namespace Database\Seeders;

use App\Models\PenilaianKPI;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianKPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PenilaianKPI::create([
            "karyawan_id" => 1,
            "tanggung_jawab" => "A",
            "penilaian_leader" => "dapat",
            "penilai" => 4,
        ]);
    }
}
