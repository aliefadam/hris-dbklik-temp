<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            "nama_jabatan" => "Direktur",
            "level" => 1,
        ]);
        Jabatan::create([
            "nama_jabatan" => "Manager",
            "level" => 2,
        ]);
        Jabatan::create([
            "nama_jabatan" => "Head",
            "level" => 3,
        ]);
        Jabatan::create([
            "nama_jabatan" => "Staff",
            "level" => 4,
        ]);
        Jabatan::create([
            "nama_jabatan" => "Intern",
            "level" => 5,
        ]);
    }
}
