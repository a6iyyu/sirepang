<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->integer('idkader', true)->unique('idkader_unique');
            $table->string('nik', 16);
            $table->string('nama');
            $table->integer('idkecamatan')->index('fk_kader_kecamatan1_idx');

            $table->primary(['idkader']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kader');
    }
};
