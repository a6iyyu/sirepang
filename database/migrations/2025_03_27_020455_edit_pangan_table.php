<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->dropColumn('urt');
            $table->dropColumn('takaran');
            $table->integer('id_takaran')->index('fk_takaran');
            $table->foreign(['id_takaran'], 'fk_takaran')->references(['id_takaran'])->on('takaran')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pangan');
    }
};