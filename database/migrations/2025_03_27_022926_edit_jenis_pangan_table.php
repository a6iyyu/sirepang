<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jenis_pangan', function (Blueprint $table) {
            $table->addColumn('integer', 'parent')->nullable()->index();
            $table->dropColumn('bobot_jenis');
            $table->dropColumn('skor_maks_jenis');
            $table->decimal('bobot_jenis', 9)->nullable();
            $table->decimal('skor_maks_jenis', 9)->nullable();
            $table->index('id_jenis_pangan', 'fk_id_jenis_pangan');
        });

        // Schema::create('jenis_pangan', function (Blueprint $table) {
        //     $table->integer('id_jenis_pangan', true)->unique('id_jenis_pangan_unique');
        //     $table->integer('parent')->nullable()->index('fk_jenis_pangan');
        //     $table->string('nama_jenis');
        //     $table->decimal('bobot_jenis', 9)->nullable();
        //     $table->decimal('skor_maks_jenis', 9)->nullable();

        //     $table->primary(['id_jenis_pangan']);
        // });
    }

    public function down(): void {
        Schema::table('jenis_pangan', function (Blueprint $table) {
            $table->dropColumn('parent');
            $table->dropColumn('bobot_jenis');
            $table->dropColumn('skor_maks_jenis');
        });
    }
};
