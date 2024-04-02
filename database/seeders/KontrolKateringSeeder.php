<?php

namespace Database\Seeders;

use App\Models\KontrolKatering;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrolKateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KontrolKatering::create([
            "status" => "Non Aktif",
            "batas_akhir" => null,
        ]);
    }
}
