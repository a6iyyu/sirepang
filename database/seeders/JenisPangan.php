<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPangan extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pangan')->delete();
        DB::table('jenis_pangan')->insert([
            0 =>
            [
                'id_jenis_pangan' => 1,
                'nama_jenis' => 'Padi-Padian',
                'bobot_jenis' => '0.50',
                'skor_maks_jenis' => '25.00',
                'parent' => null
            ],
            1 =>
            [
                'id_jenis_pangan' => 2,
                'nama_jenis' => 'Umbi-Umbian',
                'bobot_jenis' => '0.50',
                'skor_maks_jenis' => '2.50',
                'parent' => null
            ],
            2 =>
            [
                'id_jenis_pangan' => 3,
                'nama_jenis' => 'Ikan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            3 =>
            [
                'id_jenis_pangan' => 4,
                'nama_jenis' => 'Daging',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            4 => [
                'id_jenis_pangan' => 5,
                'nama_jenis' => 'Telur dan Susu',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            5 =>
            [
                'id_jenis_pangan' => 6,
                'nama_jenis' => 'Sayur-Sayuran',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            6 => [
                'id_jenis_pangan' => 7,
                'nama_jenis' => 'Kacang-Kacangan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            7 =>
            [
                'id_jenis_pangan' => 8,
                'nama_jenis' => 'Buah-Buahan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            8 =>
            [
                'id_jenis_pangan' => 9,
                'nama_jenis' => 'Minyak dan Lemak',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            9=>
            [
                'id_jenis_pangan' => 10,
                'nama_jenis' => 'Bahan Minuman',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            10=>
            [
                'id_jenis_pangan' => 11,
                'nama_jenis' => 'Bahan Minuman',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            11=>
            [
                'id_jenis_pangan' => 12,
                'nama_jenis' => 'Bumbu-Bumbuan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            12=>
            [
                'id_jenis_pangan' => 13,
                'nama_jenis' => 'Konsumsi Lainnya',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            13=>
            [
                'id_jenis_pangan' => 14,
                'nama_jenis' => 'Makanan dan Minuman Jadi',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => null
            ],
            14=>
            [
                'id_jenis_pangan' => 15,
                'nama_jenis' => 'Ikan Segar',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 3
            ],
            15=>
            [
                'id_jenis_pangan' => 16,
                'nama_jenis' => 'Udang dan Hewan Air Lainnya yang Segar',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 3
            ],
            16=>
            [
                'id_jenis_pangan' => 17,
                'nama_jenis' => 'Ikan Diawetkan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 3
            ],
            17=>
            [
                'id_jenis_pangan' => 18,
                'nama_jenis' => 'Udang dan Hewan Air Lainnya yang Diawetkan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 3
            ],
            18=>
            [
                'id_jenis_pangan' => 19,
                'nama_jenis' => 'Daging Segar',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 4
            ],
            19=>
            [
                'id_jenis_pangan' => 20,
                'nama_jenis' => 'Daging Diawetkan',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 4
            ],
            20=>
            [
                'id_jenis_pangan' => 21,
                'nama_jenis' => 'Lainnya',
                'bobot_jenis' => null,
                'skor_maks_jenis' => null,
                'parent' => 4
            ]

        ]);
    }
}
