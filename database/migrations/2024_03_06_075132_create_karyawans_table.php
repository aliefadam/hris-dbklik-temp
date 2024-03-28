<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("divisi_id");
            $table->foreignId("sub_divisi_id");
            $table->string("nama_lengkap");
            $table->string("nama_panggilan");
            $table->string("jenis_kelamin");
            $table->string("email");
            $table->foreignId("jabatan_id");
            $table->date("tanggal_masuk_kerja");
            $table->text("alamat_domisili");
            $table->text("alamat_ktp");
            $table->bigInteger("no_nik");
            $table->bigInteger("no_kk");
            $table->bigInteger("no_npwp");
            $table->bigInteger("no_bpjs_ktk");
            $table->bigInteger("no_bpjs_kes");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("agama");
            $table->string("pendidikan_terakhir");
            $table->integer("tahun_lulus");
            $table->string("status_pernikahan");
            $table->bigInteger("no_telephone");
            $table->bigInteger("no_whatsapp");
            $table->bigInteger("no_rekening_bca");
            $table->string("inventaris_kantor");
            $table->date("berakhir_kerja");
            $table->string("range_kontrak");
            $table->bigInteger("kontak_darurat");
            $table->foreignId("cabang_id");
            $table->string("cv_file");
            $table->string("ksk_file");
            $table->string("ijasah_file");
            $table->string("transkrip_nilai_file");
            $table->string("ktp_file");
            $table->string("bpjs_ktk_file");
            $table->string("bpjs_kes_file");
            $table->string("referensi_kerja_file");
            $table->string("foto")->nullable();
            $table->string("status_karyawan");
            $table->string("catatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
