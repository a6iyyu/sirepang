<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('anggota_keluarga', function (Blueprint $table) {
            $table->foreign(['anggota_keluarga_keluarga_id'], 'anggota_keluarga_ibfk_1')->references(['keluarga_id'])->on('keluarga')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('anggota_keluarga', function (Blueprint $table) {
            $table->dropForeign('anggota_keluarga_ibfk_1');
        });
    }
};