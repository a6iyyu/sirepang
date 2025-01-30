<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->foreign(['keluarga_kec_id'], 'keluarga_ibfk_1')->references(['kec_id'])->on('kecamatan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['keluarga_desa_id'], 'keluarga_ibfk_2')->references(['desa_id'])->on('desa')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['keluarga_kader_id'], 'keluarga_ibfk_3')->references(['kader_id'])->on('kader')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->dropForeign('keluarga_ibfk_1');
            $table->dropForeign('keluarga_ibfk_2');
            $table->dropForeign('keluarga_ibfk_3');
        });
    }
};