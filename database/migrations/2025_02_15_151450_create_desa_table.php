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
        Schema::create('desa', function (Blueprint $table) {
            $table->integer('iddesa', true)->unique('iddesa_unique');
            $table->string('namaDesa');
            $table->integer('idkecamatan')->index('fk_desa_kecamatan_idx');

            $table->primary(['iddesa']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
