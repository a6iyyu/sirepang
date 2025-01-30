<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->integer('anggota_keluarga_id', true);
            $table->string('anggota_keluarga_nik');
            $table->string('anggota_keluarga_nama');
            $table->string('anggota_keluarga_tempat_lahir')->nullable();
            $table->date('anggota_keluarga_tanggal_lahir')->nullable();
            $table->string('anggota_keluarga_agama')->nullable();
            $table->enum('anggota_keluarga_jk', ['Pria', 'Wanita'])->nullable();
            $table->string('anggota_keluarga_pendidikan')->nullable();
            $table->string('anggota_keluarga_pekerjaan')->nullable();
            $table->text('anggota_keluarga_keterangan')->nullable();
            $table->boolean('anggota_keluarga_baru_menikah')->nullable();
            $table->boolean('anggota_keluarga_hamil')->nullable();
            $table->boolean('anggota_keluarga_menyusui')->nullable();
            $table->boolean('anggota_keluarga_stunting')->nullable();
            $table->integer('anggota_keluarga_keluarga_id')->index('anggota_keluarga_keluarga_id');
            $table->string('anggota_keluarga_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_keluarga');
    }
};