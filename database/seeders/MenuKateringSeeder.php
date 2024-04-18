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
            "tanggal" => "2024-04-01",
            "menu" => "Ayam Suwir",
        ]);

        MenuKatering::create([
            "hari" => "Selasa",
            "tanggal" => "2024-04-02",
            "menu" => "Nasi Goreng",
        ]);

        MenuKatering::create([
            "hari" => "Rabu",
            "tanggal" => "2024-04-03",
            "menu" => "Ayam Geprek",
        ]);

        MenuKatering::create([
            "hari" => "Kamis",
            "tanggal" => "2024-04-04",
            "menu" => "Ikan Bakar",
        ]);

        MenuKatering::create([
            "hari" => "Jumat",
            "tanggal" => "2024-04-05",
            "menu" => "Cumi Sambal Hitam",
        ]);

        MenuKatering::create([
            "hari" => "Sabtu",
            "tanggal" => "2024-04-06",
            "menu" => "Gurami Bakar",
        ]);
    }
}
