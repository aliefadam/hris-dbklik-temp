<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cabang;
use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\SubDivisi;
use App\Models\Izin;
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


        // Divisi
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

        // Jabatan
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

        // Cabang
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


        Karyawan::create([
            'divisi_id' => 1,
            'sub_divisi_id' => 101,
            'nama_lengkap' => 'John Doe',
            'nama_panggilan' => 'John',
            'email' => 'john.doe@example.com',
            'jabatan_id' => 1,
            'tanggal_masuk_kerja' => '2023-01-15',
            'alamat_domisili' => 'Jl. Contoh No. 123, Kota Contoh',
            'alamat_ktp' => 'Jl. Contoh No. 123, Kota Contoh',
            'no_nik' => 1234567890123456,
            'no_kk' => 1234567890123456,
            'no_npwp' => 1234567890,
            'no_bpjs_ktk' => 12345678901234,
            'no_bpjs_kes' => 12345678901234,
            'tempat_lahir' => 'Contoh City',
            'tanggal_lahir' => '1990-05-25',
            'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'tahun_lulus' => 2012,
            'status_pernikahan' => 'Belum Menikah',
            'no_telephone' => 81234567890,
            'no_whatsapp' => 81234567890,
            'no_rekening_bca' => 1234567890,
            'inventaris_kantor' => 'Laptop, Monitor, Keyboard, Mouse',
            'berakhir_kerja' => null,
            'range_kontrak' => '1 tahun',
            'kontak_darurat' => 81234567891,
            'cabang_id' => 1,
            'jatah_cuti' => 12,
            'cv_file' => 'john_doe_cv.pdf',
            'ksk_file' => 'john_doe_ksk.pdf',
            'ijasah_file' => 'john_doe_ijazah.pdf',
            'transkrip_nilai_file' => 'john_doe_transkrip.pdf',
            'ktp_file' => 'john_doe_ktp.pdf',
            'bpjs_ktk_file' => 'john_doe_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'john_doe_bpjs_kes.pdf',
            'referensi_kerja_file' => 'john_doe_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

    }
}
