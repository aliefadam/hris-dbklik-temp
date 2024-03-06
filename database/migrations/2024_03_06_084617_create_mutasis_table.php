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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id");
            $table->string("jenis_mutasi");
            $table->string("cabang_awal")->nullable();
            $table->string("cabang_tujuan")->nullable();
            $table->string("jabatan_awal")->nullable();
            $table->string("jabatan_tujuan")->nullable();
            $table->string("divisi_awal")->nullable();
            $table->string("divisi_tujuan")->nullable();
            $table->string("sub_divisi_awal")->nullable();
            $table->string("sub_divisi_tujuan")->nullable();
            $table->string("surat_mutasi_file");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
