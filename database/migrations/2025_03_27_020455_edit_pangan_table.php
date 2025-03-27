<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->dropColumn('urt');
            $table->dropColumn('takaran');
            $table->integer('id_takaran')->index('fk_takaran');
            $table->foreign(['id_takaran'], 'fk_takaran')->references(['id_takaran'])->on('takaran')->onUpdate('no action')->onDelete('no action');
        });

        // Schema::create('pangan', function (Blueprint $table) {
        //     $table->integer('id_pangan', true)->unique('id_pangan_unique');
        //     $table->string('nama_pangan');
        //     $table->decimal('gram', 9);
        //     $table->decimal('energi', 9);
        //     $table->decimal('lemak', 9);
        //     $table->decimal('protein', 9);
        //     $table->decimal('karbohidrat', 9);
        //     $table->integer('id_jenis_pangan')->index('fk_pangan_jenis_pangan1_idx');
        //     $table->integer('id_takaran')->index('fk_takaran');

        //     $table->primary(['id_pangan']);
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists('pangan');
    }
};