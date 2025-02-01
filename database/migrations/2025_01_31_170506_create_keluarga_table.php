<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->integer('keluarga_id', true);
            $table->string('keluarga_no_kk')->nullable();
            $table->integer('keluarga_desa_id')->index('keluarga_desa_id');
            $table->integer('keluarga_kec_id')->index('keluarga_kec_id');
            $table->integer('jumlah_anggota_keluarga')->default(1);
            $table->text('keluarga_alamat')->nullable();
            $table->string('keluarga_kode_pos')->nullable();
            $table->integer('keluarga_kader_id')->nullable()->index('keluarga_kader_id');
            $table->double('keluarga_min_pendapatan')->nullable();
            $table->double('keluarga_max_pendapatan')->nullable();
            $table->double('keluarga_min_pengeluaran')->nullable();
            $table->double('keluarga_max_pengeluaran')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};