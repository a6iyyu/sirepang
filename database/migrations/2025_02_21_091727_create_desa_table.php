<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->integer('id_desa', true)->unique('id_desa_unique');
            $table->string('kode_wilayah');
            $table->string('nama_desa');
            $table->integer('id_kecamatan')->index('fk_desa_kecamatan_idx');

            $table->primary(['id_desa']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};