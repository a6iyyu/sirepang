<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->integer('desa_id', true);
            $table->string('desa_nama');
            $table->integer('desa_kec_id')->index('desa_kec_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};