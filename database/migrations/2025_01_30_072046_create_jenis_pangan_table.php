<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jenis_pangan', function (Blueprint $table) {
            $table->integer('jenis_pangan_id', true);
            $table->string('jenis_pangan_nama');
            $table->double('jenis_pangan_bobot');
            $table->double('jenis_pangan_skor_max');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_pangan');
    }
};