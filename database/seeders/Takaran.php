<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Takaran extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('takaran')->delete();
        DB::table('takaran')->insert(
            [
                0 =>
                [
                    'nama_takaran' => 'Kilogram'
                ],
                1 =>
                [
                    'nama_takaran' => 'Ons'
                ],
                2 =>
                [
                    'nama_takaran' => 'Butir'
                ],
                3 =>
                [
                    'nama_takaran' => 'Liter'
                ],
                4 =>
                [
                    'nama_takaran' => 'Gram'
                ],
                5 =>
                [
                    'nama_takaran' => 'Potong'
                ],
                6 =>
                [
                    'nama_takaran' => 'Buah'
                ],
                7 =>
                [
                    'nama_takaran' => 'Porsi'
                ],
                8 =>
                [
                    'nama_takaran' => 'Galon'
                ],
                9 =>
                [
                    'nama_takaran' => 'Gelas'
                ],
                10 =>
                [
                    'nama_takaran' => 'Mangkok Kecil'
                ],
                11 =>
                [
                    'nama_takaran' => '250 Mililiter'
                ],
                12 =>
                [
                    'nama_takaran' => '397 Gram'
                ],
                13 => ['nama_takaran' => 'Bungkus'],
                14 =>
                [
                    'nama_takaran' => '2 Gram'
                ],
                15=>
                [
                    'nama_takaran' => '20 Gram'
                ],
                16=>
                [
                    'nama_takaran' => '100 Mililiter'
                ],
                18=>
                [
                    'nama_takaran' => '80 Gram'
                ],
                19=>
                [
                    'nama_takaran' => '150 Gram'
                ],
                20=>
                [
                    'nama_takaran' => 'Porsi | 5 Tusuk'
                ],
                21=>['nama_takaran' => '200 Mililiter'],
            ]
        );
    }
}
