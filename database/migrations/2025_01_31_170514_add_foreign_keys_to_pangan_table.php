<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->foreign(['pangan_jenis_pangan_id'], 'pangan_ibfk_1')->references(['jenis_pangan_id'])->on('jenis_pangan')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->dropForeign('pangan_ibfk_1');
        });
    }
};