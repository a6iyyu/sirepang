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
        Schema::create('detail_pangan_keluarga', function (Blueprint $table) {
            $table->integer('iddetail_pangan_keluarga', true)->unique('iddetail_pangan_keluarga_unique');
            $table->string('jum_urt', 10);
            $table->timestamp('waktu')->useCurrent();
            $table->integer('idkeluarga')->index('fk_detail_pangan_keluarga_keluarga1_idx');
            $table->integer('idpangan')->index('fk_detail_pangan_keluarga_pangan1_idx');

            $table->primary(['iddetail_pangan_keluarga']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pangan_keluarga');
    }
};
