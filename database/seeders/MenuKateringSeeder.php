<?php

namespace Database\Seeders;

use App\Models\MenuKatering;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuKateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuKatering::create([
            "hari" => "Senin",
            "tanggal" => null,
            "menu" => null,
        ]);

        MenuKatering::create([
            "hari" => "Selasa",
            "tanggal" => null,
            "menu" => null,
        ]);

        MenuKatering::create([
            "hari" => "Rabu",
            "tanggal" => null,
            "menu" => null,
        ]);

        MenuKatering::create([
            "hari" => "Kamis",
            "tanggal" => null,
            "menu" => null,
        ]);

        MenuKatering::create([
            "hari" => "Jumat",
            "tanggal" => null,
            "menu" => null,
        ]);

        MenuKatering::create([
            "hari" => "Sabtu",
            "tanggal" => null,
            "menu" => null,
        ]);
    }
}
