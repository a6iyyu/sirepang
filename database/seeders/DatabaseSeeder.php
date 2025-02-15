<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void {
        $this->call(KecamatanTableSeeder::class);
        $this->call(DesaTableSeeder::class);
        $this->call(JenisPanganTableSeeder::class);
        $this->call(PanganTableSeeder::class);
        $this->call(KaderTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
