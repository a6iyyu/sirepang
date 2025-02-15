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
        Schema::table('keluarga', function (Blueprint $table) {
            $table->foreign(['iddesa'], 'fk_keluarga_desa1')->references(['iddesa'])->on('desa')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idkader'], 'fk_keluarga_kader1')->references(['idkader'])->on('kader')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['kecamatan_idkecamatan'], 'fk_keluarga_kecamatan1')->references(['idkecamatan'])->on('kecamatan')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->dropForeign('fk_keluarga_desa1');
            $table->dropForeign('fk_keluarga_kader1');
            $table->dropForeign('fk_keluarga_kecamatan1');
        });
    }
};
