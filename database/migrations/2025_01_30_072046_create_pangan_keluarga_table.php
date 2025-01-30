<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pangan_keluarga', function (Blueprint $table) {
            $table->integer('pangan_keluarga_id', true);
            $table->string('pangan_keluarga_nama')->nullable();
            $table->date('pangan_keluarga_tanggal')->nullable();
            $table->text('pangan_keluarga_keterangan')->nullable();
            $table->bigInteger('pangan_keluarga_jumlah_porsi')->nullable();
            $table->integer('pangan_keluarga_keluarga_id')->nullable()->index('pangan_keluarga_keluarga_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pangan_keluarga');
    }
};