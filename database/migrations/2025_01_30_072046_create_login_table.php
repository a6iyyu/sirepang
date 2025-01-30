<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('login', function (Blueprint $table) {
            $table->integer('login_id', true);
            $table->string('login_username');
            $table->string('login_password');
            $table->integer('login_user_id');
            $table->enum('login_tipe', ['Admin', 'Kader']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login');
    }
};