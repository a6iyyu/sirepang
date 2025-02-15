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
        Schema::table('detail_pangan_keluarga', function (Blueprint $table) {
            $table->foreign(['idkeluarga'], 'fk_detail_pangan_keluarga_keluarga1')->references(['idkeluarga'])->on('keluarga')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idpangan'], 'fk_detail_pangan_keluarga_pangan1')->references(['idpangan'])->on('pangan')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pangan_keluarga', function (Blueprint $table) {
            $table->dropForeign('fk_detail_pangan_keluarga_keluarga1');
            $table->dropForeign('fk_detail_pangan_keluarga_pangan1');
        });
    }
};
