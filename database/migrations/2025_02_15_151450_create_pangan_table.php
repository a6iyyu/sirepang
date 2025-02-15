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
        Schema::create('pangan', function (Blueprint $table) {
            $table->integer('idpangan', true)->unique('idpangan_unique');
            $table->string('nama_pangan');
            $table->string('takaran');
            $table->integer('urt');
            $table->decimal('gram', 9);
            $table->decimal('kalori', 9);
            $table->decimal('lemak', 9);
            $table->decimal('karbohidrat', 9);
            $table->decimal('protein', 9);
            $table->integer('idjenis_pangan')->index('fk_pangan_jenis_pangan1_idx');

            $table->primary(['idpangan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pangan');
    }
};
