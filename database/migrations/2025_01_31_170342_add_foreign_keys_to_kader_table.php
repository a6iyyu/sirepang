<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kader', function (Blueprint $table) {
            $table->foreign(['kader_kec_id'], 'kader_ibfk_1')->references(['kec_id'])->on('kecamatan')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::table('kader', function (Blueprint $table) {
            $table->dropForeign('kader_ibfk_1');
        });
    }
};