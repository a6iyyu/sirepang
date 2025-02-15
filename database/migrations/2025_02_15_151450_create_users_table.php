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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('iduser', true)->unique('id_unique');
            $table->string('username', 50)->unique('username_unique');
            $table->string('password', 32);
            $table->enum('tipe', ['admin', 'kader']);
            $table->integer('idkader')->nullable()->unique('idkader');

            $table->primary(['iduser']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
