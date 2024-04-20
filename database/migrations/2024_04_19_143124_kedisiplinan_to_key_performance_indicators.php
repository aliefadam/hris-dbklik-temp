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
        Schema::table('key_performance_indicators', function (Blueprint $table) {
            //
            $table->char('nilai', 1)->default('-')->change();
            $table->decimal('kedisiplinan', 3, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('key_performance_indicators', function (Blueprint $table) {
            //
            $table->dropColumn('kedisiplinan');
            $table->char('nilai', 1)->default(' ')->change();
        });
    }
};
