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
        Schema::create('key_performance_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id");
            $table->char('nilai', 1);
            $table->boolean('apresiasi')->nullable()->default(false);
            $table->date('periode');
            $table->decimal('kedisiplinan', 3, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_performance_indicators');
    }
};
