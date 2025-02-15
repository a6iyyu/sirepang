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
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->integer('idkecamatan', true)->unique('idkecamatan_unique');
            $table->string('namaKec');

            $table->primary(['idkecamatan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};
