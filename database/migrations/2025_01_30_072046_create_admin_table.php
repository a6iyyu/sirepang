<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('admin_id', true);
            $table->integer('admin_nik');
            $table->string('admin_nama');
            $table->string('admin_tempat_lahir')->nullable();
            $table->date('admin_tanggal_lahir')->nullable();
            $table->enum('admin_jk', ['Pria', 'Wanita'])->nullable();
            $table->string('admin_agama')->nullable();
            $table->string('admin_pekerjaan')->nullable();
            $table->text('admin_keterangan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};