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
        Schema::table('pangan_keluarga', function (Blueprint $table) {
            $table->foreign(['id_pangan'], 'pangan_keluarga_ibfk_1')->references(['id_pangan'])->on('pangan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_keluarga'], 'pangan_keluarga_ibfk_2')->references(['id_keluarga'])->on('keluarga')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pangan_keluarga', function (Blueprint $table) {
            $table->dropForeign('pangan_keluarga_ibfk_1');
            $table->dropForeign('pangan_keluarga_ibfk_2');
        });
    }
};
