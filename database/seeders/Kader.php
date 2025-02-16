<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kader extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('kader')->delete();
        DB::table('kader')->insert([
            0 =>
                [
                    'id_kader' => 1,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Ampelgading',
                    'id_kecamatan' => 1,
                ],
            1 =>
                [
                    'id_kader' => 2,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Bantur',
                    'id_kecamatan' => 2,
                ],
            2 =>
                [
                    'id_kader' => 3,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Bululawang',
                    'id_kecamatan' => 3,
                ],
            3 =>
                [
                    'id_kader' => 4,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Dampit',
                    'id_kecamatan' => 4,
                ],
            4 =>
                [
                    'id_kader' => 5,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Dau',
                    'id_kecamatan' => 5,
                ],
            5 =>
                [
                    'id_kader' => 6,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Donomulyo',
                    'id_kecamatan' => 6,
                ],
            6 =>
                [
                    'id_kader' => 7,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Gedangan',
                    'id_kecamatan' => 7,
                ],
            7 =>
                [
                    'id_kader' => 8,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Gondanglegi',
                    'id_kecamatan' => 8,
                ],
            8 =>
                [
                    'id_kader' => 9,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Jabung',
                    'id_kecamatan' => 9,
                ],
            9 =>
                [
                    'id_kader' => 10,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Kalipare',
                    'id_kecamatan' => 10,
                ],
            10 =>
                [
                    'id_kader' => 11,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Karangploso',
                    'id_kecamatan' => 11,
                ],
            11 =>
                [
                    'id_kader' => 12,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Kasembon',
                    'id_kecamatan' => 12,
                ],
            12 =>
                [
                    'id_kader' => 13,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Kepanjen',
                    'id_kecamatan' => 13,
                ],
            13 =>
                [
                    'id_kader' => 14,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Kromengan',
                    'id_kecamatan' => 14,
                ],
            14 =>
                [
                    'id_kader' => 15,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Lawang',
                    'id_kecamatan' => 15,
                ],
            15 =>
                [
                    'id_kader' => 16,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Ngajum',
                    'id_kecamatan' => 16,
                ],
            16 =>
                [
                    'id_kader' => 17,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Ngantang',
                    'id_kecamatan' => 17,
                ],
            17 =>
                [
                    'id_kader' => 18,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Pagak',
                    'id_kecamatan' => 18,
                ],
            18 =>
                [
                    'id_kader' => 19,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Pagelaran',
                    'id_kecamatan' => 19,
                ],
            19 =>
                [
                    'id_kader' => 20,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Pakis',
                    'id_kecamatan' => 20,
                ],
            20 =>
                [
                    'id_kader' => 21,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Pakisaji',
                    'id_kecamatan' => 21,
                ],
            21 =>
                [
                    'id_kader' => 22,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Poncokusumo',
                    'id_kecamatan' => 22,
                ],
            22 =>
                [
                    'id_kader' => 23,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Pujon',
                    'id_kecamatan' => 23,
                ],
            23 =>
                [
                    'id_kader' => 24,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Singosari',
                    'id_kecamatan' => 24,
                ],
            24 =>
                [
                    'id_kader' => 25,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Sumbermanjing Wetan',
                    'id_kecamatan' => 25,
                ],
            25 =>
                [
                    'id_kader' => 26,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Sumberpucung',
                    'id_kecamatan' => 26,
                ],
            26 =>
                [
                    'id_kader' => 27,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Tajinan',
                    'id_kecamatan' => 27,
                ],
            27 =>
                [
                    'id_kader' => 28,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Tirtoyudo',
                    'id_kecamatan' => 28,
                ],
            28 =>
                [
                    'id_kader' => 29,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Tumpang',
                    'id_kecamatan' => 29,
                ],
            29 =>
                [
                    'id_kader' => 30,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Turen',
                    'id_kecamatan' => 30,
                ],
            30 =>
                [
                    'id_kader' => 31,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Wagir',
                    'id_kecamatan' => 31,
                ],
            31 =>
                [
                    'id_kader' => 32,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Wajak',
                    'id_kecamatan' => 32,
                ],
            32 =>
                [
                    'id_kader' => 33,
                    'nik' => '000000',
                    'nama' => 'Penyuluh Wonosari',
                    'id_kecamatan' => 33,
                ],
        ]);
    }
}