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
                    'nama_jenis' => 'Padi - Padian',
                    'bobot_jenis' => '0.50',
                    'skor_maks_jenis' => '25.00',
                ],
            1 =>
                [
                    'id_jenis_pangan' => 2,
                    'nama_jenis' => 'Umbi - Umbian',
                    'bobot_jenis' => '0.50',
                    'skor_maks_jenis' => '2.50',
                ],
            2 =>
                [
                    'id_jenis_pangan' => 3,
                    'nama_jenis' => 'Pangan Hewani',
                    'bobot_jenis' => '2.00',
                    'skor_maks_jenis' => '24.00',
                ],
            3 =>
                [
                    'id_jenis_pangan' => 4,
                    'nama_jenis' => 'Minyak dan Lemak',
                    'bobot_jenis' => '0.50',
                    'skor_maks_jenis' => '5.00',
                ],
            4 =>
                [
                    'id_jenis_pangan' => 5,
                    'nama_jenis' => 'Buah/Biji Berminyak',
                    'bobot_jenis' => '0.50',
                    'skor_maks_jenis' => '1.00',
                ],
            5 =>
                [
                    'id_jenis_pangan' => 6,
                    'nama_jenis' => 'Kacang-kacangan',
                    'bobot_jenis' => '2.00',
                    'skor_maks_jenis' => '10.00',
                ],
            6 =>
                [
                    'id_jenis_pangan' => 7,
                    'nama_jenis' => 'Gula',
                    'bobot_jenis' => '0.50',
                    'skor_maks_jenis' => '2.50',
                ],
            7 =>
                [
                    'id_jenis_pangan' => 8,
                    'nama_jenis' => 'Sayur dan Buah',
                    'bobot_jenis' => '5.00',
                    'skor_maks_jenis' => '30.00',
                ],
            8 =>
                [
                    'id_jenis_pangan' => 9,
                    'nama_jenis' => 'Bumbu/Minuman/Lain-lain',
                    'bobot_jenis' => '0.00',
                    'skor_maks_jenis' => '0.00',
                ],
        ]);
    }
}