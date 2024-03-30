<?php

namespace Database\Seeders;

use App\Models\SubDivisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sub Divisi
        SubDivisi::create([
            "divisi_id" => "1",
            "nama_sub_divisi" => "Accounting",
        ]);
        SubDivisi::create([
            "divisi_id" => "1",
            "nama_sub_divisi" => "Tax",
        ]);
        SubDivisi::create([
            "divisi_id" => "2",
            "nama_sub_divisi" => "Distribution",
        ]);
        SubDivisi::create([
            "divisi_id" => "2",
            "nama_sub_divisi" => "Telemarketing",
        ]);
        SubDivisi::create([
            "divisi_id" => "3",
            "nama_sub_divisi" => "Admin",
        ]);
        SubDivisi::create([
            "divisi_id" => "3",
            "nama_sub_divisi" => "Product Spesialis",
        ]);
        SubDivisi::create([
            "divisi_id" => "3",
            "nama_sub_divisi" => "Sales",
        ]);
        SubDivisi::create([
            "divisi_id" => "4",
            "nama_sub_divisi" => "Admin",
        ]);
        SubDivisi::create([
            "divisi_id" => "5",
            "nama_sub_divisi" => "Sales",
        ]);
        SubDivisi::create([
            "divisi_id" => "6",
            "nama_sub_divisi" => "Uploader",
        ]);
        SubDivisi::create([
            "divisi_id" => "6",
            "nama_sub_divisi" => "Designer",
        ]);
        SubDivisi::create([
            "divisi_id" => "6",
            "nama_sub_divisi" => "Chatter",
        ]);
        SubDivisi::create([
            "divisi_id" => "6",
            "nama_sub_divisi" => "Marketplace Development",
        ]);
        SubDivisi::create([
            "divisi_id" => "6",
            "nama_sub_divisi" => "Admin Nota",
        ]);
        SubDivisi::create([
            "divisi_id" => "7",
            "nama_sub_divisi" => "Admin",
        ]);
        SubDivisi::create([
            "divisi_id" => "8",
            "nama_sub_divisi" => "Content Creator",
        ]);
        SubDivisi::create([
            "divisi_id" => "8",
            "nama_sub_divisi" => "SEO SPC",
        ]);
        SubDivisi::create([
            "divisi_id" => "11",
            "nama_sub_divisi" => "Pengiriman",
        ]);
        SubDivisi::create([
            "divisi_id" => "11",
            "nama_sub_divisi" => "Admin",
        ]);
        SubDivisi::create([
            "divisi_id" => "10",
            "nama_sub_divisi" => "Developer",
        ]);
        SubDivisi::create([
            "divisi_id" => "11",
            "nama_sub_divisi" => "IT Support",
        ]);
        SubDivisi::create([
            "divisi_id" => "12",
            "nama_sub_divisi" => "Sopir",
        ]);
        SubDivisi::create([
            "divisi_id" => "12",
            "nama_sub_divisi" => "Picker",
        ]);
        SubDivisi::create([
            "divisi_id" => "12",
            "nama_sub_divisi" => "Checker",
        ]);
        SubDivisi::create([
            "divisi_id" => "12",
            "nama_sub_divisi" => "Helper",
        ]);
        SubDivisi::create([
            "divisi_id" => "12",
            "nama_sub_divisi" => "Admin",
        ]);
    }
}
