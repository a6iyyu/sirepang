<?php

namespace Database\Seeders;

use App\Models\Keluarga as ModelsKeluarga;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class Keluarga extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            $status = Arr::random(['MENUNGGU', 'DITERIMA', 'DITOLAK']);
            
            $komentar = '';
            if ($status === 'DITOLAK') {
                $komentar = Arr::random([
                    'Data tidak lengkap.',
                    'Diperlukan verifikasi lebih lanjut.',
                    'Dokumen tidak valid.',
                    'Mohon lengkapi informasi yang diminta.',
                    'Data tidak sesuai dengan ketentuan.'
                ]);
            }

            ModelsKeluarga::create([
                'id_desa'               => rand(1, 390),
                'id_kecamatan'          => rand(1, 33),
                'id_kader'              => rand(1, 33),
                'rentang_pendapatan'    => rand(1, 4),
                'rentang_pengeluaran'   => rand(1, 4),
                'status'                => $status,
                'nama_kepala_keluarga'  => Factory::create()->unique()->name(),
                'jumlah_keluarga'       => rand(1, 5),
                'alamat'                => 'Mekarsari',
                'gambar'                => base64_encode(file_get_contents(public_path('logo.webp'))),
                'komentar'              => $komentar,
            ]);
        }
    }
}