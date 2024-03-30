<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::create([
            "nama_cabang" => "Surabaya - Tenggilis",
            "alamat" => "Raya Tenggilis Mejoyo No.AA - 3, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur 60293"
        ]);
        Cabang::create([
            "nama_cabang" => "Surabaya - ITC",
            "alamat" => "ITC Surabaya Mega Grosir Lt.2 Blok L7 No.8 Jl. Gembong No.20 - 30, Kapasan, Kec. Simokerto, Surabaya, Jawa Timur 60141"
        ]);
        Cabang::create([
            "nama_cabang" => "Yogyakarta",
            "alamat" => "JI. Kemuning Gandok No.C12, Pikgondeng, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281"
        ]);
        Cabang::create([
            "nama_cabang" => "Jakarta",
            "alamat" => "Kompleks Ruko Aeroworld Blok C1 No. 5, Citra 8, Citra Garden City, RT.4/RW.8, Daerah Khusus Ibukota Jakarta 11830"
        ]);
        Cabang::create([
            "nama_cabang" => "Semarang",
            "alamat" => "JI. Semarang Indah Blok C8 No.24, Tawangmas, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50144"
        ]);
        Cabang::create([
            "nama_cabang" => "Malang",
            "alamat" => "Jl. Seram No.21, Kasin, Kec. Klojen, Malang, Jawa Timur 65117"
        ]);
        Cabang::create([
            "nama_cabang" => "Bali",
            "alamat" => "Jl. Raya Sesetan No.119a, Sesetan, Denpasar Selatan, Kota Denpasar, Bali 80223"
        ]);
    }
}
