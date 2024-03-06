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
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id");
            $table->foreignId("izin_id");
            $table->dateTime("timestamp");
            $table->date("tanggal_mulai");
            $table->date("tanggal_akhir");
            $table->text("catatan");
            $table->string("bukti_file");
            $table->string("status");
            $table->string("feedback");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};
