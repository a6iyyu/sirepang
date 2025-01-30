<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('detail_pangan_keluarga', function (Blueprint $table) {
            $table->foreign(['detail_pangan_keluarga_pangan_id'], 'detail_pangan_keluarga_ibfk_2')->references(['pangan_id'])->on('pangan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['detail_pangan_keluarga_keluarga_id'], 'detail_pangan_keluarga_ibfk_3')->references(['keluarga_id'])->on('keluarga')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('detail_pangan_keluarga', function (Blueprint $table) {
            $table->dropForeign('detail_pangan_keluarga_ibfk_2');
            $table->dropForeign('detail_pangan_keluarga_ibfk_3');
        });
    }
};