<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentangUang extends Seeder
{
    public function run(): void
    {
        DB::table('rentang_uang')->delete();
        DB::table('rentang_uang')->insert([
            0 => [
                'id_rentang_uang' => 1,
                'batas_bawah' => 'Rp0',
                'batas_atas' => 'Rp1 juta',
            ],
            1 => [
                'id_rentang_uang' => 2,
                'batas_bawah' => 'Rp1 juta',
                'batas_atas' => 'Rp2 juta',
            ],
            2 => [
                'id_rentang_uang' => 3,
                'batas_bawah' => 'Rp2 juta',
                'batas_atas' => 'Rp3 juta',
            ],
            3 => [
                'id_rentang_uang' => 4,
                'batas_bawah' => 'Rp3 juta',
                'batas_atas' => 'Rp4 juta',
            ],
            4 => [
                'id_rentang_uang' => 5,
                'batas_bawah' => 'Rp4 juta',
                'batas_atas' => 'Rp5 juta',
            ],
            5 => [
                'id_rentang_uang' => 6,
                'batas_bawah' => 'Rp5 juta',
                'batas_atas' => 'Rp6 juta',
            ],
            6 => [
                'id_rentang_uang' => 7,
                'batas_bawah' => 'Rp6 juta',
                'batas_atas' => 'Rp7 juta',
            ],
            7 => [
                'id_rentang_uang' => 8,
                'batas_bawah' => 'Rp7 juta',
                'batas_atas' => 'Rp8 juta',
            ],
            8 => [
                'id_rentang_uang' => 9,
                'batas_bawah' => 'Rp8 juta',
                'batas_atas' => 'Rp9 juta',
            ],
            9 => [
                'id_rentang_uang' => 10,
                'batas_bawah' => 'Rp9 juta',
                'batas_atas' => 'Rp10 juta',
            ],
            10 => [
                'id_rentang_uang' => 11,
                'batas_bawah' => 'Rp10 juta',
                'batas_atas' => 'Rp20 juta',
            ],
            11 => [
                'id_rentang_uang' => 12,
                'batas_bawah' => 'Rp20 juta',
                'batas_atas' => 'Rp30 juta',
            ],
            12 => [
                'id_rentang_uang' => 13,
                'batas_bawah' => 'Rp30 juta',
                'batas_atas' => 'Rp40 juta',
            ],
            13 => [
                'id_rentang_uang' => 14,
                'batas_bawah' => 'Rp40 juta',
                'batas_atas' => 'Rp50 juta',
            ],
            14 => [
                'id_rentang_uang' => 15,
                'batas_bawah' => 'Lebih dari',
                'batas_atas' => 'Rp50 juta',
            ]
        ]);
    }
}
