<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kecamatan extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('kecamatan')->delete();
        DB::table('kecamatan')->insert([
            0 =>
                [
                    'id_kecamatan' => 1,
                    'nama_kecamatan' => 'Ampelgading',
                ],
            1 =>
                [
                    'id_kecamatan' => 2,
                    'nama_kecamatan' => 'Bantur',
                ],
            2 =>
                [
                    'id_kecamatan' => 3,
                    'nama_kecamatan' => 'Bululawang',
                ],
            3 =>
                [
                    'id_kecamatan' => 4,
                    'nama_kecamatan' => 'Dampit',
                ],
            4 =>
                [
                    'id_kecamatan' => 5,
                    'nama_kecamatan' => 'Dau',
                ],
            5 =>
                [
                    'id_kecamatan' => 6,
                    'nama_kecamatan' => 'Donomulyo',
                ],
            6 =>
                [
                    'id_kecamatan' => 7,
                    'nama_kecamatan' => 'Gedangan',
                ],
            7 =>
                [
                    'id_kecamatan' => 8,
                    'nama_kecamatan' => 'Gondanglegi',
                ],
            8 =>
                [
                    'id_kecamatan' => 9,
                    'nama_kecamatan' => 'Jabung',
                ],
            9 =>
                [
                    'id_kecamatan' => 10,
                    'nama_kecamatan' => 'Kalipare',
                ],
            10 =>
                [
                    'id_kecamatan' => 11,
                    'nama_kecamatan' => 'Karangploso',
                ],
            11 =>
                [
                    'id_kecamatan' => 12,
                    'nama_kecamatan' => 'Kasembon',
                ],
            12 =>
                [
                    'id_kecamatan' => 13,
                    'nama_kecamatan' => 'Kepanjen',
                ],
            13 =>
                [
                    'id_kecamatan' => 14,
                    'nama_kecamatan' => 'Kromengan',
                ],
            14 =>
                [
                    'id_kecamatan' => 15,
                    'nama_kecamatan' => 'Lawang',
                ],
            15 =>
                [
                    'id_kecamatan' => 16,
                    'nama_kecamatan' => 'Ngajum',
                ],
            16 =>
                [
                    'id_kecamatan' => 17,
                    'nama_kecamatan' => 'Ngantang',
                ],
            17 =>
                [
                    'id_kecamatan' => 18,
                    'nama_kecamatan' => 'Pagak',
                ],
            18 =>
                [
                    'id_kecamatan' => 19,
                    'nama_kecamatan' => 'Pagelaran',
                ],
            19 =>
                [
                    'id_kecamatan' => 20,
                    'nama_kecamatan' => 'Pakis',
                ],
            20 =>
                [
                    'id_kecamatan' => 21,
                    'nama_kecamatan' => 'Pakisaji',
                ],
            21 =>
                [
                    'id_kecamatan' => 22,
                    'nama_kecamatan' => 'Poncokusumo',
                ],
            22 =>
                [
                    'id_kecamatan' => 23,
                    'nama_kecamatan' => 'Pujon',
                ],
            23 =>
                [
                    'id_kecamatan' => 24,
                    'nama_kecamatan' => 'Singosari',
                ],
            24 =>
                [
                    'id_kecamatan' => 25,
                    'nama_kecamatan' => 'Sumawe',
                ],
            25 =>
                [
                    'id_kecamatan' => 26,
                    'nama_kecamatan' => 'Sumberpucung',
                ],
            26 =>
                [
                    'id_kecamatan' => 27,
                    'nama_kecamatan' => 'Tajinan',
                ],
            27 =>
                [
                    'id_kecamatan' => 28,
                    'nama_kecamatan' => 'Tirtoyudo',
                ],
            28 =>
                [
                    'id_kecamatan' => 29,
                    'nama_kecamatan' => 'Tumpang',
                ],
            29 =>
                [
                    'id_kecamatan' => 30,
                    'nama_kecamatan' => 'Turen',
                ],
            30 =>
                [
                    'id_kecamatan' => 31,
                    'nama_kecamatan' => 'Wagir',
                ],
            31 =>
                [
                    'id_kecamatan' => 32,
                    'nama_kecamatan' => 'Wajak',
                ],
            32 =>
                [
                    'id_kecamatan' => 33,
                    'nama_kecamatan' => 'Wonosari',
                ],
        ]);
    }
}