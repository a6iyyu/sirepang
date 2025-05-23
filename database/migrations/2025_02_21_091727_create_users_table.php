<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_user', true)->unique('id_unique');
            $table->string('username', 50)->unique('username_unique');
            $table->string('password', 100);
            $table->enum('tipe', ['admin', 'kader']);
            $table->integer('id_kader')->nullable()->unique('id_kader');
            $table->rememberToken();

            $table->primary(['id_user']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};