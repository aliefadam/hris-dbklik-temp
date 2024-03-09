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
            $table->date("tanggal_mulai");
            $table->date("tanggal_akhir");
            $table->text("catatan")->nullable();
            $table->string("bukti_file")->nullable();
            $table->string("status");
            $table->string("feedback")->nullable();
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
