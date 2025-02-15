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
        Schema::table('kader', function (Blueprint $table) {
            $table->foreign(['idkecamatan'], 'fk_kader_kecamatan1')->references(['idkecamatan'])->on('kecamatan')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kader', function (Blueprint $table) {
            $table->dropForeign('fk_kader_kecamatan1');
        });
    }
};
