<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cabang;
use App\Models\Divisi;
use App\Models\Izin;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\MenuKatering;
use App\Models\PemesananKatering;
use App\Models\RulesHRD;
use App\Models\SubDivisi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            IzinSeeder::class,
            DivisiSeeder::class,
            SubDivisiSeeder::class,
            JabatanSeeder::class,
            CabangSeeder::class,
            RulesHRDSeeder::class,
            MenuKateringSeeder::class,
            KaryawanSeeder::class,
            UserSeeder::class,
            KontrolKateringSeeder::class,
            KeyPerformanceIndicatorSeeder::class,
        ]);
    }
}
