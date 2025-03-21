<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->integer('id_kecamatan', true)->unique('id_kecamatan_unique');
            $table->string('kode_wilayah');
            $table->string('nama_kecamatan');

            $table->primary(['id_kecamatan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};