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
        Schema::create('pemesanan_katerings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id");
            $table->string("hari");
            $table->date("tanggal");
            $table->string("menu");
            $table->string("setuju");
            $table->string("request")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_katerings');
    }
};
