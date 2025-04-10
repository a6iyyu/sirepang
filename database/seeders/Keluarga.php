<?php

namespace Database\Seeders;

use App\Models\Keluarga as ModelsKeluarga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class Keluarga extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ModelsKeluarga::create([
                'id_desa'               => rand(1, 5),
                'id_kecamatan'          => rand(1, 5),
                'id_kader'              => rand(1, 5),
                'rentang_pendapatan'    => rand(1, 4),
                'rentang_pengeluaran'   => rand(1, 4),
                'status'                => Arr::random(['MENUNGGU', 'DITERIMA', 'DITOLAK']),
                'nama_kepala_keluarga'  => "BAPAK" . rand(1, 100),
                'jumlah_keluarga'       => rand(1, 5),
                'alamat'                => 'Mekarsari',
                'gambar'                => base64_encode(file_get_contents(public_path('img/logo.webp'))),
            ]);
        }
    }
}