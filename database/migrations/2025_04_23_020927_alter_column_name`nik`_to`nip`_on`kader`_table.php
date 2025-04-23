<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kader', function (Blueprint $table) {
            $table->renameColumn('nik', 'nip');
            $table->string('contact_info')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('kader', function (Blueprint $table) {
            $table->renameColumn('nip', 'nik');
            $table->dropColumn('contact_info');
        });
    }
};