<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPengajuan extends Model
{
    use HasFactory;

    public static $dataPengajuan = [
        [
            "id" => "1",
            "divisi" => "IT",
            "nama" => "Alief",
            "izin" => "Sakit",
            "tanggal_diajukan" => "Minggu, 4 Maret 2024 - 09:00",
            "tanggal_izin" => "5 Maret - 6 Maret 2024",
            "catatan" => "-",
            "file_pendukung" => "-",
            "status" => "pending",
        ],
        [
            "id" => "2",
            "divisi" => "IT",
            "nama" => "Joko",
            "izin" => "Sakit",
            "tanggal_diajukan" => "Minggu, 4 Maret 2024 - 09:00",
            "tanggal_izin" => "5 Maret - 6 Maret 2024",
            "catatan" => "Sakit Mendadak",
            "file_pendukung" => "surat-dokter.pdf",
            "status" => "disetujui",
        ],
        [
            "id" => "3",
            "divisi" => "IT",
            "nama" => "Tono",
            "izin" => "Sakit",
            "tanggal_diajukan" => "Minggu, 4 Maret 2024 - 09:00",
            "tanggal_izin" => "5 Maret - 6 Maret 2024",
            "catatan" => "-",
            "file_pendukung" => "-",
            "status" => "ditolak",
        ],
    ];

    public static function getAll()
    {
        return DaftarPengajuan::$dataPengajuan;
    }
}
