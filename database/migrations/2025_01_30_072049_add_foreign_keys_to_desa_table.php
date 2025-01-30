<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->foreign(['desa_kec_id'], 'desa_ibfk_1')->references(['kec_id'])->on('kecamatan')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->dropForeign('desa_ibfk_1');
        });
    }
};