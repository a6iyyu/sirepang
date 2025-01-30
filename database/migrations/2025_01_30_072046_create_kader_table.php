<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->integer('kader_id', true);
            $table->string('kader_nik');
            $table->string('kader_nama');
            $table->string('kader_tempat_lahir')->nullable();
            $table->date('kader_tanggal_lahir')->nullable();
            $table->enum('kader_jk', ['Pria', 'Wanita'])->nullable();
            $table->string('kader_agama')->nullable();
            $table->string('kader_pekerjaan')->nullable();
            $table->text('kader_keterangan')->nullable();
            $table->integer('kader_kec_id')->index('kader_kecamatan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kader');
    }
};