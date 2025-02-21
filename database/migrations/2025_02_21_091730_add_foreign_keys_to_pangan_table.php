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
        Schema::table('pangan', function (Blueprint $table) {
            $table->foreign(['id_jenis_pangan'], 'fk_pangan_jenis_pangan1')->references(['id_jenis_pangan'])->on('jenis_pangan')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->dropForeign('fk_pangan_jenis_pangan1');
        });
    }
};
