<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->string('referensi_urt')->nullable();
            $table->string('referensi_gram_berat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pangan', function (Blueprint $table) {
            $table->dropColumn('referensi_urt');
            $table->dropColumn('referensi_gram_berat');
        });
    }
};