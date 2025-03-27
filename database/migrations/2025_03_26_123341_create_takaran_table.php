<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('takaran', function (Blueprint $table) {
            $table->integer('id_takaran', true)->unique();
            $table->string('nama_takaran', 20)->unique();
            $table->timestamps();

            $table->primary('id_takaran');
        });

        Schema::table('takaran', function (Blueprint $table) {
            $table->index('id_takaran', 'id_takaran_unique');
            $table->index('nama_takaran', 'nama_takaran_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('takaran');
    }
};