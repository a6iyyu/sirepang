<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pangan_keluarga', function (Blueprint $table) {
            $table->decimal('urt', 8, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('pangan_keluarga', function (Blueprint $table) {
            $table->unsignedInteger('urt')->change();
        });
    }
};