<?php

namespace Database\Seeders;

use App\Models\RulesHRD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RulesHRDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RulesHRD::create([
            "judul" => "Izin Cuti atau Tidak Masuk bagi yang belum punya jatah cuti (Max Diambil 2 Hari Berturut)",
            "aturan" => "Karyawan menulis form h-2 minggu sebelum hari cuti.",
        ]);

        RulesHRD::create([
            "judul" => "Izin Sakit (akan masuk ke cuti-apabila memiliki cuti)",
            "aturan" => "Karyawan menulis form max jam 8 pagi di hari bekerja.",
        ]);
    }
}
