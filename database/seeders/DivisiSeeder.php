<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divisi::create([
            "nama_divisi" => "Accounting",
        ]);
        Divisi::create([
            "nama_divisi" => "Sales",
        ]);
        Divisi::create([
            "nama_divisi" => "Project Manager",
        ]);
        Divisi::create([
            "nama_divisi" => "HR",
        ]);
        Divisi::create([
            "nama_divisi" => "Retail",
        ]);
        Divisi::create([
            "nama_divisi" => "Online",
        ]);
        Divisi::create([
            "nama_divisi" => "Data Center",
        ]);
        Divisi::create([
            "nama_divisi" => "Digital Marketing",
        ]);
        Divisi::create([
            "nama_divisi" => "Product SPC",
        ]);
        Divisi::create([
            "nama_divisi" => "IT",
        ]);
        Divisi::create([
            "nama_divisi" => "SERVICE",
        ]);
        Divisi::create([
            "nama_divisi" => "Warehouse",
        ]);
    }
}
