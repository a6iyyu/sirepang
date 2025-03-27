<?php

namespace Database\Seeders;

use Database\Seeders\Desa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            Kecamatan::class,
            Desa::class,
            Takaran::class,
            JenisPangan::class,
            Pangan::class,
            Kader::class,
            RentangUang::class,
            Users::class,
        ]);
    }
}