<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pangan', function (Blueprint $table) {
            $table->integer('pangan_id', true);
            $table->string('pangan_nama');
            $table->string('pangan_takaran')->nullable();
            $table->double('pangan_urt')->nullable();
            $table->decimal('pangan_gram', 9)->nullable();
            $table->decimal('pangan_kalori', 9)->nullable();
            $table->decimal('pangan_lemak', 9)->nullable();
            $table->decimal('pangan_karbohidrat', 9)->nullable();
            $table->decimal('pangan_protein', 9)->nullable();
            $table->integer('pangan_jenis_pangan_id')->index('pangan_jenis_pangan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pangan');
    }
};