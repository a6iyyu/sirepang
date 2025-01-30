<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pangan_keluarga', function (Blueprint $table) {
            $table->foreign(['pangan_keluarga_keluarga_id'], 'pangan_keluarga_ibfk_1')->references(['keluarga_id'])->on('keluarga')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('pangan_keluarga', function (Blueprint $table) {
            $table->dropForeign('pangan_keluarga_ibfk_1');
        });
    }
};