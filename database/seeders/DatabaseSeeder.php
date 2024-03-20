<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cabang;
use App\Models\Divisi;
use App\Models\Izin;
use App\Models\Jabatan;
use App\Models\Karyawan;
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

        // Izin
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
        Jabatan::create([
            "nama_jabatan" => "Intern",
            "level" => 5,
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

        RulesHRD::create([
            "judul" => "Izin Cuti atau Tidak Masuk bagi yang belum punya jatah cuti (Max Diambil 2 Hari Berturut)",
            "aturan" => "Karyawan menulis form h-2 minggu sebelum hari cuti.",
        ]);

        RulesHRD::create([
            "judul" => "Izin Sakit (akan masuk ke cuti-apabila memiliki cuti)",
            "aturan" => "Karyawan menulis form max jam 8 pagi di hari bekerja.",
        ]);

        Karyawan::create([
            'divisi_id' => 10,
            'sub_divisi_id' => 20,
            'nama_lengkap' => 'John Doe',
            'nama_panggilan' => 'John',
            "jenis_kelamin" => "Laki-laki",
            'email' => 'john.doe@example.com',
            'jabatan_id' => 4,
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
            'agama' => 'Islam',
            'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'tahun_lulus' => 2012,
            'status_pernikahan' => 'Belum Menikah',
            'no_telephone' => 81234567890,
            'no_whatsapp' => 81234567890,
            'no_rekening_bca' => 1234567890,
            'inventaris_kantor' => 'Laptop, Monitor, Keyboard, Mouse',
            'berakhir_kerja' => "2029-05-25",
            'range_kontrak' => '1 tahun',
            'kontak_darurat' => 81234567891,
            'cabang_id' => 1,
            'jatah_cuti' => 6,
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

        Karyawan::create([
            'divisi_id' => 10,
            'sub_divisi_id' => 20,
            'nama_lengkap' => 'Jane Smith',
            'nama_panggilan' => 'Jane',
            "jenis_kelamin" => "Perempuan",
            'email' => 'jane.smith@example.com',
            'jabatan_id' => 4,
            'tanggal_masuk_kerja' => '2023-02-20',
            'alamat_domisili' => 'Jl. Sampel No. 456, Kota Sampel',
            'alamat_ktp' => 'Jl. Asli No. 789, Kota Asal',
            'no_nik' => 2345678901234567,
            'no_kk' => 2345678901234567,
            'no_npwp' => 2345678901,
            'no_bpjs_ktk' => 23456789012345,
            'no_bpjs_kes' => 23456789012345,
            'tempat_lahir' => 'Sample City',
            'tanggal_lahir' => '1988-10-10',
            'agama' => 'Kristen',
            'pendidikan_terakhir' => 'S1 Manajemen Bisnis',
            'tahun_lulus' => 2010,
            'status_pernikahan' => 'Menikah',
            'no_telephone' => 82345678901,
            'no_whatsapp' => 82345678901,
            'no_rekening_bca' => 2345678901,
            'inventaris_kantor' => 'Laptop, Monitor, Docking Station',
            'berakhir_kerja' => "2029-05-25",
            'range_kontrak' => '2 tahun',
            'kontak_darurat' => 82345678902,
            'cabang_id' => 2,
            'jatah_cuti' => 6,
            'cv_file' => 'jane_smith_cv.pdf',
            'ksk_file' => 'jane_smith_ksk.pdf',
            'ijasah_file' => 'jane_smith_ijazah.pdf',
            'transkrip_nilai_file' => 'jane_smith_transkrip.pdf',
            'ktp_file' => 'jane_smith_ktp.pdf',
            'bpjs_ktk_file' => 'jane_smith_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'jane_smith_bpjs_kes.pdf',
            'referensi_kerja_file' => 'jane_smith_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

        Karyawan::create([
            'divisi_id' => 10,
            'sub_divisi_id' => 20,
            'nama_lengkap' => 'Alex Johnson',
            'nama_panggilan' => 'Alex',
            "jenis_kelamin" => "Laki-laki",
            'email' => 'alex.johnson@example.com',
            'jabatan_id' => 4,
            'tanggal_masuk_kerja' => '2023-03-01',
            'alamat_domisili' => 'Jl. Dummy No. 101, Kota Dummy',
            'alamat_ktp' => 'Jl. Palsu No. 202, Kota Palsu',
            'no_nik' => 3456789012345678,
            'no_kk' => 3456789012345678,
            'no_npwp' => 3456789012,
            'no_bpjs_ktk' => 34567890123456,
            'no_bpjs_kes' => 34567890123456,
            'tempat_lahir' => 'Dummy City',
            'tanggal_lahir' => '1992-07-15',
            'agama' => 'Islam',
            'pendidikan_terakhir' => 'S1 Teknik Elektro',
            'tahun_lulus' => 2014,
            'status_pernikahan' => 'Belum Menikah',
            'no_telephone' => 83456789012,
            'no_whatsapp' => 83456789012,
            'no_rekening_bca' => 3456789012,
            'inventaris_kantor' => 'Laptop, Headset',
            'berakhir_kerja' => "2029-05-25",
            'range_kontrak' => '3 tahun',
            'kontak_darurat' => 83456789013,
            'cabang_id' => 2,
            'jatah_cuti' => 6,
            'cv_file' => 'alex_johnson_cv.pdf',
            'ksk_file' => 'alex_johnson_ksk.pdf',
            'ijasah_file' => 'alex_johnson_ijazah.pdf',
            'transkrip_nilai_file' => 'alex_johnson_transkrip.pdf',
            'ktp_file' => 'alex_johnson_ktp.pdf',
            'bpjs_ktk_file' => 'alex_johnson_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'alex_johnson_bpjs_kes.pdf',
            'referensi_kerja_file' => 'alex_johnson_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

        Karyawan::create([
            'divisi_id' => 10,
            'sub_divisi_id' => 0,
            'nama_lengkap' => 'Eva Turner',
            'nama_panggilan' => 'Eva',
            "jenis_kelamin" => "Perempuan",
            'email' => 'eva.turner@example.com',
            'jabatan_id' => 3,
            'tanggal_masuk_kerja' => '2023-04-15',
            'alamat_domisili' => 'Jl. Example No. 304, Kota Simulasi',
            'alamat_ktp' => 'Jl. Simulasi No. 408, Kota Simulasi',
            'no_nik' => 4567890123456789,
            'no_kk' => 4567890123456789,
            'no_npwp' => 4567890123,
            'no_bpjs_ktk' => 45678901234567,
            'no_bpjs_kes' => 45678901234567,
            'tempat_lahir' => 'Simulated City',
            'tanggal_lahir' => '1994-09-20',
            'agama' => 'Kristen',
            'pendidikan_terakhir' => 'S1 Desain Komunikasi Visual',
            'tahun_lulus' => 2016,
            'status_pernikahan' => 'Belum Menikah',
            'no_telephone' => 84567890123,
            'no_whatsapp' => 84567890123,
            'no_rekening_bca' => 4567890123,
            'inventaris_kantor' => 'Laptop, Tablet Grafis',
            'berakhir_kerja' => "2030-04-15",
            'range_kontrak' => '3 tahun',
            'kontak_darurat' => 84567890124,
            'cabang_id' => 1,
            'jatah_cuti' => 6,
            'cv_file' => 'eva_turner_cv.pdf',
            'ksk_file' => 'eva_turner_ksk.pdf',
            'ijasah_file' => 'eva_turner_ijazah.pdf',
            'transkrip_nilai_file' => 'eva_turner_transkrip.pdf',
            'ktp_file' => 'eva_turner_ktp.pdf',
            'bpjs_ktk_file' => 'eva_turner_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'eva_turner_bpjs_kes.pdf',
            'referensi_kerja_file' => 'eva_turner_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

        Karyawan::create([
            'divisi_id' => 4,
            'sub_divisi_id' => 0,
            'nama_lengkap' => 'Mark Bennett',
            'nama_panggilan' => 'Mark',
            "jenis_kelamin" => "Perempuan",
            'email' => 'mark.bennett@gmail.com',
            'jabatan_id' => 3,
            'tanggal_masuk_kerja' => '2023-02-01',
            'alamat_domisili' => 'Jl. Fiktif No. 512, Kota Buatan',
            'alamat_ktp' => 'Jl. Buatan No. 616, Kota Fiktif',
            'no_nik' => 5678901234567890,
            'no_kk' => 5678901234567890,
            'no_npwp' => 5678901234,
            'no_bpjs_ktk' => 56789012345678,
            'no_bpjs_kes' => 56789012345678,
            'tempat_lahir' => 'Fictional City',
            'tanggal_lahir' => '1990-12-30',
            'agama' => 'Islam',
            'pendidikan_terakhir' => 'S1 Teknik Mesin',
            'tahun_lulus' => 2013,
            'status_pernikahan' => 'Menikah',
            'no_telephone' => 85678901234,
            'no_whatsapp' => 85678901234,
            'no_rekening_bca' => 5678901234,
            'inventaris_kantor' => 'Laptop, Monitor Eksternal',
            'berakhir_kerja' => "2031-05-01",
            'range_kontrak' => '3 tahun',
            'kontak_darurat' => 85678901235,
            'cabang_id' => 1,
            'jatah_cuti' => 6,
            'cv_file' => 'mark_bennett_cv.pdf',
            'ksk_file' => 'mark_bennett_ksk.pdf',
            'ijasah_file' => 'mark_bennett_ijazah.pdf',
            'transkrip_nilai_file' => 'mark_bennett_transkrip.pdf',
            'ktp_file' => 'mark_bennett_ktp.pdf',
            'bpjs_ktk_file' => 'mark_bennett_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'mark_bennett_bpjs_kes.pdf',
            'referensi_kerja_file' => 'mark_bennett_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

        Karyawan::create([
            'divisi_id' => 0,
            'sub_divisi_id' => 0,
            'nama_lengkap' => 'Tom Holland',
            'nama_panggilan' => 'Tom',
            "jenis_kelamin" => "Laki-laki",
            'email' => 'tom.holland@example.com',
            'jabatan_id' => 1,
            'tanggal_masuk_kerja' => '2023-05-01',
            'alamat_domisili' => 'Jl. Fiktif No. 512, Kota Buatan',
            'alamat_ktp' => 'Jl. Buatan No. 616, Kota Fiktif',
            'no_nik' => 5678901234567890,
            'no_kk' => 5678901234567890,
            'no_npwp' => 5678901234,
            'no_bpjs_ktk' => 56789012345678,
            'no_bpjs_kes' => 56789012345678,
            'tempat_lahir' => 'Fictional City',
            'tanggal_lahir' => '1990-12-30',
            'agama' => 'Kristen',
            'pendidikan_terakhir' => 'S1 Teknik Mesin',
            'tahun_lulus' => 2013,
            'status_pernikahan' => 'Menikah',
            'no_telephone' => 85678901234,
            'no_whatsapp' => 85678901234,
            'no_rekening_bca' => 5678901234,
            'inventaris_kantor' => 'Laptop, Monitor Eksternal',
            'berakhir_kerja' => "2031-05-01",
            'range_kontrak' => '3 tahun',
            'kontak_darurat' => 85678901235,
            'cabang_id' => 1,
            'jatah_cuti' => 6,
            'cv_file' => 'tom_holland_cv.pdf',
            'ksk_file' => 'tom_holland_ksk.pdf',
            'ijasah_file' => 'tom_holland_ijazah.pdf',
            'transkrip_nilai_file' => 'tom_holland_transkrip.pdf',
            'ktp_file' => 'tom_holland_ktp.pdf',
            'bpjs_ktk_file' => 'tom_holland_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'tom_holland_bpjs_kes.pdf',
            'referensi_kerja_file' => 'tom_holland_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

        Karyawan::create([
            'divisi_id' => 4,
            'sub_divisi_id' => 0,
            'nama_lengkap' => 'Alee Feyy',
            'nama_panggilan' => 'Alee',
            "jenis_kelamin" => "Laki-laki",
            'email' => 'aleefeyy@gmail.com',
            'jabatan_id' => 2,
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
            'agama' => 'Islam',
            'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'tahun_lulus' => 2012,
            'status_pernikahan' => 'Belum Menikah',
            'no_telephone' => 81234567890,
            'no_whatsapp' => 81234567890,
            'no_rekening_bca' => 1234567890,
            'inventaris_kantor' => 'Laptop, Monitor, Keyboard, Mouse',
            'berakhir_kerja' => "2029-05-25",
            'range_kontrak' => '1 tahun',
            'kontak_darurat' => 81234567891,
            'cabang_id' => 1,
            'jatah_cuti' => 6,
            'cv_file' => 'alee_feyy_cv.pdf',
            'ksk_file' => 'alee_feyy_ksk.pdf',
            'ijasah_file' => 'alee_feyy_ijazah.pdf',
            'transkrip_nilai_file' => 'alee_feyy_transkrip.pdf',
            'ktp_file' => 'alee_feyy_ktp.pdf',
            'bpjs_ktk_file' => 'alee_feyy_bpjs_ktk.pdf',
            'bpjs_kes_file' => 'alee_feyy_bpjs_kes.pdf',
            'referensi_kerja_file' => 'alee_feyy_referensi.pdf',
            'status_karyawan' => 'Aktif',
            'catatan' => '-',
        ]);

        Karyawan::create([
            'divisi_id' => 10,
            'sub_divisi_id' => 20,
            'nama_lengkap' => 'Lukman',
            'nama_panggilan' => 'Lukman',
            "jenis_kelamin" => "Laki-laki",
            'email' => 'lukman@example.com',
            'jabatan_id' => 4,
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
            'agama' => 'Islam',
            'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'tahun_lulus' => 2012,
            'status_pernikahan' => 'Belum Menikah',
            'no_telephone' => 81234567890,
            'no_whatsapp' => 81234567890,
            'no_rekening_bca' => 1234567890,
            'inventaris_kantor' => 'Laptop, Monitor, Keyboard, Mouse',
            'berakhir_kerja' => "2029-05-25",
            'range_kontrak' => '1 tahun',
            'kontak_darurat' => 81234567891,
            'cabang_id' => 1,
            'jatah_cuti' => 6,
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

        // User
        User::create([
            "karyawan_id" => 1,
            "email" => 'john.doe@example.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);
        User::create([
            "karyawan_id" => 2,
            "email" => 'jane.smith@example.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);
        User::create([
            "karyawan_id" => 3,
            "email" => 'alex.johnson@example.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);
        User::create([
            "karyawan_id" => 4,
            "email" => 'eva.turner@example.com',
            "password" => "123",
            "roleLevel" => "2",
        ]);
        User::create([
            "karyawan_id" => 5,
            "email" => 'mark.bennett@example.com',
            "password" => "123",
            "roleLevel" => "3",
        ]);
        User::create([
            "karyawan_id" => 6,
            "email" => 'tom.holland@example.com',
            "password" => "123",
            "roleLevel" => "1",
        ]);
        User::create([
            "karyawan_id" => 7,
            "email" => 'aleefeyy@gmail.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);

        User::create([
            "karyawan_id" => 8,
            "email" => 'lukman@example.com',
            "password" => "123",
            "roleLevel" => "2",
        ]);
    }
}
