<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public static $dataKaryawan = [
        [
            "id" => 1,
            "nama" => "Alief Sya'arah Adam",
            "email" => "aliefadam6@gmail.com",
            "no_telephone" => "895364711840",
            "no_whatsapp" => "895364711840",
            "alamat" => "JL. Bandarejo Candi 3 No. 11 RT 11 RW 05, Sememi, Benowo, Surabaya.",
            "tanggal_mulai_kontrak" => "26 January 2024",
            "tanggal_berakhir_kontrak" => "06 Mei 2024",
            "no_rekening" => "123456",
            "divisi" => "IT",
            "sub_divisi" => "Developer",
            "jabatan" => "Intern",
            "lokasi_kerja" => "Tenggilis",
            "status" => "Magang",
        ],
        [
            "id" => 2,
            "nama" => "Rahma Indah Sari",
            "email" => "rahmaindah@example.com",
            "no_telephone" => "81234567890",
            "no_whatsapp" => "81234567890",
            "alamat" => "JL. Kedung Baruk 56 RT 04 RW 02, Rungkut, Surabaya.",
            "tanggal_mulai_kontrak" => "01 February 2024",
            "tanggal_berakhir_kontrak" => "31 July 2024",
            "no_rekening" => "7891011",
            "divisi" => "Marketing",
            "sub_divisi" => "Analyst",
            "jabatan" => "Associate",
            "lokasi_kerja" => "Tenggilis",
            "status" => "Magang",
        ],
        [
            "id" => 3,
            "nama" => "Fajar Nugraha",
            "email" => "fajarnugraha@example.com",
            "no_telephone" => "82345678901",
            "no_whatsapp" => "82345678901",
            "alamat" => "JL. Dukuh Kupang Timur XXII No. 5, Dukuh Pakis, Surabaya.",
            "tanggal_mulai_kontrak" => "15 March 2024",
            "tanggal_berakhir_kontrak" => "14 September 2024",
            "no_rekening" => "112131415",
            "divisi" => "HR",
            "sub_divisi" => "Recruitment",
            "jabatan" => "Specialist",
            "lokasi_kerja" => "Tenggilis",
            "status" => "Tetap",
        ],
        [
            "id" => 4,
            "nama" => "Dian Setiawan",
            "email" => "diansetiawan@example.com",
            "no_telephone" => "83456789012",
            "no_whatsapp" => "83456789012",
            "alamat" => "JL. Siwalankerto Utara 45 RT 09 RW 03, Wonocolo, Surabaya.",
            "tanggal_mulai_kontrak" => "20 April 2024",
            "tanggal_berakhir_kontrak" => "19 October 2024",
            "no_rekening" => "161718192",
            "divisi" => "Finance",
            "sub_divisi" => "Accounting",
            "jabatan" => "Manager",
            "lokasi_kerja" => "Tenggilis",
            "status" => "Tetap",
        ],
        [
            "id" => 5,
            "nama" => "Ayu Lestari",
            "email" => "ayulestari@example.com",
            "no_telephone" => "84567890123",
            "no_whatsapp" => "84567890123",
            "alamat" => "JL. Gayungan IV No. 22 RT 06 RW 04, Gayungan, Surabaya.",
            "tanggal_mulai_kontrak" => "05 May 2024",
            "tanggal_berakhir_kontrak" => "04 November 2024",
            "no_rekening" => "202122232",
            "divisi" => "Operational",
            "sub_divisi" => "Logistics",
            "jabatan" => "Coordinator",
            "lokasi_kerja" => "Tenggilis",
            "status" => "Kontrak",
        ],
        [
            "id" => 6,
            "nama" => "Bayu Ari Wibowo",
            "email" => "bayuwibowo@example.com",
            "no_telephone" => "85678901234",
            "no_whatsapp" => "85678901234",
            "alamat" => "JL. Medokan Semampir Selatan III No. 11 RT 02 RW 06, Sukolilo, Surabaya.",
            "tanggal_mulai_kontrak" => "10 June 2024",
            "tanggal_berakhir_kontrak" => "09 December 2024",
            "no_rekening" => "242526272",
            "divisi" => "Creative",
            "sub_divisi" => "Design",
            "jabatan" => "Senior Designer",
            "lokasi_kerja" => "Tenggilis",
            "status" => "Kontrak",
        ],
    ];

    public static function getKaryawan()
    {
        return Karyawan::$dataKaryawan;
    }

    public static function getKaryawanById($id)
    {
        foreach (Karyawan::$dataKaryawan as $karyawan) {
            if ($karyawan["id"] == $id) {
                return $karyawan;
            }
        }
    }
}
