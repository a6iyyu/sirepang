<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->integer('kec_id', true);
            $table->string('kec_nama');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};