<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_pangan_keluarga', function (Blueprint $table) {
            $table->integer('id_detail_pangan_keluarga', true)->unique('id_detail_pangan_keluarga_unique');
            $table->string('jumlah_urt', 10);
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->integer('id_keluarga')->index('fk_detail_pangan_keluarga_keluarga1_idx');
            $table->integer('id_pangan')->index('fk_detail_pangan_keluarga_pangan1_idx');

            $table->primary(['id_detail_pangan_keluarga']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pangan_keluarga');
    }
};
