<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->foreign(['id_desa'], 'fk_keluarga_desa1')->references(['id_desa'])->on('desa')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_kader'], 'fk_keluarga_kader1')->references(['id_kader'])->on('kader')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['kecamatan_id_kecamatan'], 'fk_keluarga_kecamatan1')->references(['id_kecamatan'])->on('kecamatan')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->dropForeign('fk_keluarga_desa1');
            $table->dropForeign('fk_keluarga_kader1');
            $table->dropForeign('fk_keluarga_kecamatan1');
        });
    }
};