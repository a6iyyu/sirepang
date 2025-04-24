<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Takaran extends Seeder
{
    public function run()
    {


        DB::table('takaran')->delete();

        DB::table('takaran')->insert(
            [
            0 =>
                [
                    'id_takaran' => 1,
                    'nama_takaran' => 'Kilogram',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            1 =>
                [
                    'id_takaran' => 2,
                    'nama_takaran' => 'Ons',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            2 =>
                [
                    'id_takaran' => 3,
                    'nama_takaran' => 'Butir',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            3 =>
                [
                    'id_takaran' => 4,
                    'nama_takaran' => 'Liter',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            4 =>
                [
                    'id_takaran' => 5,
                    'nama_takaran' => 'Gram',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            5 =>
                [
                    'id_takaran' => 6,
                    'nama_takaran' => 'Potong',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            6 =>
                [
                    'id_takaran' => 7,
                    'nama_takaran' => 'Buah',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            7 =>
                [
                    'id_takaran' => 8,
                    'nama_takaran' => 'Porsi',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            8 =>
                [
                    'id_takaran' => 9,
                    'nama_takaran' => 'Galon',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            9 =>
                [
                    'id_takaran' => 10,
                    'nama_takaran' => 'Gelas',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            10 =>
                [
                    'id_takaran' => 11,
                    'nama_takaran' => 'Mangkok Kecil',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            11 =>
                [
                    'id_takaran' => 12,
                    'nama_takaran' => 'Kotak',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            12 =>
                [
                    'id_takaran' => 13,
                    'nama_takaran' => 'Kaleng',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            13 =>
                [
                    'id_takaran' => 14,
                    'nama_takaran' => 'Bungkus',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            14 =>
                [
                    'id_takaran' => 15,
                    'nama_takaran' => 'Kantong Celup',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            15 =>
                [
                    'id_takaran' => 16,
                    'nama_takaran' => 'Saset',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            16 =>
                [
                    'id_takaran' => 17,
                    'nama_takaran' => 'Botol Kecil',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ],
            ]
        );
    }
}