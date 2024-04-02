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
        Schema::create('penilaian_k_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id");
            $table->string("tanggung_jawab");
            $table->string("penilaian_leader");
            $table->foreignId("penilai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_k_p_i_s');
    }
};
