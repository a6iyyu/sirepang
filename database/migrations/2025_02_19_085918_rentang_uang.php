<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rentang_uang', function (Blueprint $table) {
            $table->integer('id_rentang_uang')->primary()->autoIncrement();
            $table->string('batas_bawah', 16);
            $table->string('batas_atas', 16);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentang_uang');
    }
};