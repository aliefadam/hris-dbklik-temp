<?php

namespace Database\Seeders;

use App\Models\Izin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IzinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Izin::create([
            "jenis_izin" => "Cuti",
            "min_pengajuan" => "336",
            "max_hari_izin" => "48"
        ]);

        Izin::create([
            "jenis_izin" => "Sakit",
            "min_pengajuan" => "1",
            "max_hari_izin" => "48"
        ]);

        Izin::create([
            "jenis_izin" => "Menikah",
            "min_pengajuan" => "120",
            "max_hari_izin" => "72"
        ]);

        Izin::create([
            "jenis_izin" => "Berduka",
            "min_pengajuan" => "1",
            "max_hari_izin" => "72"
        ]);

        Izin::create([
            "jenis_izin" => "Melahirkan",
            "min_pengajuan" => "1",
            "max_hari_izin" => "2160",
        ]);

        Izin::create([
            "jenis_izin" => "Dinas Luar",
            "min_pengajuan" => "0",
            "max_hari_izin" => "0",
        ]);

        Izin::create([
            "jenis_izin" => "Terlambat",
            "min_pengajuan" => "0",
            "max_hari_izin" => "0",
        ]);

        Izin::create([
            "jenis_izin" => "Pulang Awal",
            "min_pengajuan" => "0",
            "max_hari_izin" => "0",
        ]);
    }
}
