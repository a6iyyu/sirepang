<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->integer('id_kader', true)->unique('id_kader_unique');
            $table->string('nik', 16);
            $table->string('nama');
            $table->integer('id_kecamatan')->index('fk_kader_kecamatan1_idx');

            $table->primary(['id_kader']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kader');
    }
};