<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_pangan_keluarga', function (Blueprint $table) {
            $table->integer('detail_pangan_keluarga_id', true);
            $table->double('detail_pangan_keluarga_urt');
            $table->enum('detail_pangan_keluarga_asal', ['Beli', 'Di Beri', 'Pekarangan']);
            $table->date('detail_pangan_keluarga_tanggal');
            $table->integer('detail_pangan_keluarga_keluarga_id')->index('detail_pangan_keluarga_keluarga_id');
            $table->integer('detail_pangan_keluarga_pangan_id')->index('detail_pangan_keluarga_pangan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pangan_keluarga');
    }
};