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
        Schema::create('jenis_pangan', function (Blueprint $table) {
            $table->integer('id_jenis_pangan', true)->unique('id_jenis_pangan_unique');
            $table->string('nama_jenis');
            $table->decimal('bobot_jenis', 9);
            $table->decimal('skor_maks_jenis', 9);

            $table->primary(['id_jenis_pangan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pangan');
    }
};
