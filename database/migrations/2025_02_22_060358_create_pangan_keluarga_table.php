<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pangan_keluarga', function (Blueprint $table) {
            $table->integer('id_pangan_keluarga', true)->primary();
            $table->integer('id_pangan')->index('id_pangan');
            $table->integer('id_keluarga')->index('id_keluarga');
            $table->unsignedInteger('urt');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pangan_keluarga');
    }
};