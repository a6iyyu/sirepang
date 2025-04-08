<?php

namespace Database\Seeders;

use App\Models\Keluarga as ModelsKeluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class Keluarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ModelsKeluarga::create([
                'id_desa' => rand(1, 5),
                'id_kecamatan' => rand(1, 5),
                'id_kader' => rand(1, 5),
                'rentang_pendapatan' => rand(1, 4),
                'rentang_pengeluaran' => rand(1, 4),
                'status' => 'BELUM TERVERIFIKASI', // atau kamu bisa gunakan enum Status jika ada enum class
                'nama_kepala_keluarga' => rand(1, 100),
                'jumlah_keluarga' => rand(1, 5),
                'alamat' => 'Mekarsari',
                'gambar' => 'jfbnhsdbfushaifbua'
            ]);
        }
    }
}
