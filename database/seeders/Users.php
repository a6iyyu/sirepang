<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            0 =>
                [
                    'id_user' => 1,
                    'username' => '123',
                    'password' => Hash::make('123123'),
                    'tipe' => 'admin',
                    'id_kader' => NULL,
                ],
            1 =>
                [
                    'id_user' => 2,
                    'username' => 'ampelgading',
                    'password' => Hash::make('ampelgading'),
                    'tipe' => 'kader',
                    'id_kader' => 1,
                ],
            2 =>
                [
                    'id_user' => 3,
                    'username' => 'bantur',
                    'password' => Hash::make('bantur'),
                    'tipe' => 'kader',
                    'id_kader' => 2,
                ],
            3 =>
                [
                    'id_user' => 4,
                    'username' => 'bululawang',
                    'password' => Hash::make('bululawang'),
                    'tipe' => 'kader',
                    'id_kader' => 3,
                ],
            4 =>
                [
                    'id_user' => 5,
                    'username' => 'dampit',
                    'password' => Hash::make('dampit'),
                    'tipe' => 'kader',
                    'id_kader' => 4,
                ],
            5 =>
                [
                    'id_user' => 6,
                    'username' => 'dau',
                    'password' => Hash::make('dau'),
                    'tipe' => 'kader',
                    'id_kader' => 5,
                ],
            6 =>
                [
                    'id_user' => 7,
                    'username' => 'donomulyo',
                    'password' => Hash::make('donomulyo'),
                    'tipe' => 'kader',
                    'id_kader' => 6,
                ],
            7 =>
                [
                    'id_user' => 8,
                    'username' => 'gedangan',
                    'password' => Hash::make('gedangan'),
                    'tipe' => 'kader',
                    'id_kader' => 7,
                ],
            8 =>
                [
                    'id_user' => 9,
                    'username' => 'gondanglegi',
                    'password' => Hash::make('gondanglegi'),
                    'tipe' => 'kader',
                    'id_kader' => 8,
                ],
            9 =>
                [
                    'id_user' => 10,
                    'username' => 'jabung',
                    'password' => Hash::make('jabung'),
                    'tipe' => 'kader',
                    'id_kader' => 9,
                ],
            10 =>
                [
                    'id_user' => 11,
                    'username' => 'kalipare',
                    'password' => Hash::make('kalipare'),
                    'tipe' => 'kader',
                    'id_kader' => 10,
                ],
            11 =>
                [
                    'id_user' => 12,
                    'username' => 'karangploso',
                    'password' => Hash::make('karangploso'),
                    'tipe' => 'kader',
                    'id_kader' => 11,
                ],
            12 =>
                [
                    'id_user' => 13,
                    'username' => 'kasembon',
                    'password' => Hash::make('kasembon'),
                    'tipe' => 'kader',
                    'id_kader' => 12,
                ],
            13 =>
                [
                    'id_user' => 14,
                    'username' => 'kepanjen',
                    'password' => Hash::make('kepanjen'),
                    'tipe' => 'kader',
                    'id_kader' => 13,
                ],
            14 =>
                [
                    'id_user' => 15,
                    'username' => 'kromengan',
                    'password' => Hash::make('kromengan'),
                    'tipe' => 'kader',
                    'id_kader' => 14,
                ],
            15 =>
                [
                    'id_user' => 16,
                    'username' => 'lawang',
                    'password' => Hash::make('lawang'),
                    'tipe' => 'kader',
                    'id_kader' => 15,
                ],
            16 =>
                [
                    'id_user' => 17,
                    'username' => 'ngajum',
                    'password' => Hash::make('ngajum'),
                    'tipe' => 'kader',
                    'id_kader' => 16,
                ],
            17 =>
                [
                    'id_user' => 18,
                    'username' => 'ngantang',
                    'password' => Hash::make('ngantang'),
                    'tipe' => 'kader',
                    'id_kader' => 17,
                ],
            18 =>
                [
                    'id_user' => 19,
                    'username' => 'pagak',
                    'password' => Hash::make('pagak'),
                    'tipe' => 'kader',
                    'id_kader' => 18,
                ],
            19 =>
                [
                    'id_user' => 20,
                    'username' => 'pagelaran',
                    'password' => Hash::make('pagelaran'),
                    'tipe' => 'kader',
                    'id_kader' => 19,
                ],
            20 =>
                [
                    'id_user' => 21,
                    'username' => 'pakis',
                    'password' => Hash::make('pakis'),
                    'tipe' => 'kader',
                    'id_kader' => 20,
                ],
            21 =>
                [
                    'id_user' => 22,
                    'username' => 'pakisaji',
                    'password' => Hash::make('pakisaji'),
                    'tipe' => 'kader',
                    'id_kader' => 21,
                ],
            22 =>
                [
                    'id_user' => 23,
                    'username' => 'poncokusumo',
                    'password' => Hash::make('poncokusumo'),
                    'tipe' => 'kader',
                    'id_kader' => 22,
                ],
            23 =>
                [
                    'id_user' => 24,
                    'username' => 'pujon',
                    'password' => Hash::make('pujon'),
                    'tipe' => 'kader',
                    'id_kader' => 23,
                ],
            24 =>
                [
                    'id_user' => 25,
                    'username' => 'singosari',
                    'password' => Hash::make('singosari'),
                    'tipe' => 'kader',
                    'id_kader' => 24,
                ],
            25 =>
                [
                    'id_user' => 26,
                    'username' => 'sumawe',
                    'password' => Hash::make('sumawe'),
                    'tipe' => 'kader',
                    'id_kader' => 25,
                ],
            26 =>
                [
                    'id_user' => 27,
                    'username' => 'sumberpucung',
                    'password' => Hash::make('sumberpucung'),
                    'tipe' => 'kader',
                    'id_kader' => 26,
                ],
            27 =>
                [
                    'id_user' => 28,
                    'username' => 'tajinan',
                    'password' => Hash::make('tajinan'),
                    'tipe' => 'kader',
                    'id_kader' => 27,
                ],
            28 =>
                [
                    'id_user' => 29,
                    'username' => 'tirtoyudo',
                    'password' => Hash::make('tirtoyudo'),
                    'tipe' => 'kader',
                    'id_kader' => 28,
                ],
            29 =>
                [
                    'id_user' => 30,
                    'username' => 'tumpang',
                    'password' => Hash::make('tumpang'),
                    'tipe' => 'kader',
                    'id_kader' => 29,
                ],
            30 =>
                [
                    'id_user' => 31,
                    'username' => 'turen',
                    'password' => Hash::make('turen'),
                    'tipe' => 'kader',
                    'id_kader' => 30,
                ],
            31 =>
                [
                    'id_user' => 32,
                    'username' => 'wagir',
                    'password' => Hash::make('wagir'),
                    'tipe' => 'kader',
                    'id_kader' => 31,
                ],
            32 =>
                [
                    'id_user' => 33,
                    'username' => 'wajak',
                    'password' => Hash::make('wajak'),
                    'tipe' => 'kader',
                    'id_kader' => 32,
                ],
            33 =>
                [
                    'id_user' => 34,
                    'username' => 'wonosari',
                    'password' => Hash::make('wonosari'),
                    'tipe' => 'kader',
                    'id_kader' => 33,
                ],
            ],
        );
    }
}