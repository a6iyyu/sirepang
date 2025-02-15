<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'iduser' => 1,
                'username' => '123',
                'password' => '123123',
                'tipe' => 'admin',
                'idkader' => NULL,
            ),
            1 => 
            array (
                'iduser' => 2,
                'username' => 'ampelgading',
                'password' => 'ampelgading',
                'tipe' => 'kader',
                'idkader' => 1,
            ),
            2 => 
            array (
                'iduser' => 3,
                'username' => 'bantur',
                'password' => 'bantur',
                'tipe' => 'kader',
                'idkader' => 2,
            ),
            3 => 
            array (
                'iduser' => 4,
                'username' => 'bululawang',
                'password' => 'bululawang',
                'tipe' => 'kader',
                'idkader' => 3,
            ),
            4 => 
            array (
                'iduser' => 5,
                'username' => 'dampit',
                'password' => 'dampit',
                'tipe' => 'kader',
                'idkader' => 4,
            ),
            5 => 
            array (
                'iduser' => 6,
                'username' => 'dau',
                'password' => 'dau',
                'tipe' => 'kader',
                'idkader' => 5,
            ),
            6 => 
            array (
                'iduser' => 7,
                'username' => 'donomulyo',
                'password' => 'donomulyo',
                'tipe' => 'kader',
                'idkader' => 6,
            ),
            7 => 
            array (
                'iduser' => 8,
                'username' => 'gedangan',
                'password' => 'gedangan',
                'tipe' => 'kader',
                'idkader' => 7,
            ),
            8 => 
            array (
                'iduser' => 9,
                'username' => 'gondanglegi',
                'password' => 'gondanglegi',
                'tipe' => 'kader',
                'idkader' => 8,
            ),
            9 => 
            array (
                'iduser' => 10,
                'username' => 'jabung',
                'password' => 'jabung',
                'tipe' => 'kader',
                'idkader' => 9,
            ),
            10 => 
            array (
                'iduser' => 11,
                'username' => 'kalipare',
                'password' => 'kalipare',
                'tipe' => 'kader',
                'idkader' => 10,
            ),
            11 => 
            array (
                'iduser' => 12,
                'username' => 'karangploso',
                'password' => 'karangploso',
                'tipe' => 'kader',
                'idkader' => 11,
            ),
            12 => 
            array (
                'iduser' => 13,
                'username' => 'kasembon',
                'password' => 'kasembon',
                'tipe' => 'kader',
                'idkader' => 12,
            ),
            13 => 
            array (
                'iduser' => 14,
                'username' => 'kepanjen',
                'password' => 'kepanjen',
                'tipe' => 'kader',
                'idkader' => 13,
            ),
            14 => 
            array (
                'iduser' => 15,
                'username' => 'kromengan',
                'password' => 'kromengan',
                'tipe' => 'kader',
                'idkader' => 14,
            ),
            15 => 
            array (
                'iduser' => 16,
                'username' => 'lawang',
                'password' => 'lawang',
                'tipe' => 'kader',
                'idkader' => 15,
            ),
            16 => 
            array (
                'iduser' => 17,
                'username' => 'ngajum',
                'password' => 'ngajum',
                'tipe' => 'kader',
                'idkader' => 16,
            ),
            17 => 
            array (
                'iduser' => 18,
                'username' => 'ngantang',
                'password' => 'ngantang',
                'tipe' => 'kader',
                'idkader' => 17,
            ),
            18 => 
            array (
                'iduser' => 19,
                'username' => 'pagak',
                'password' => 'pagak',
                'tipe' => 'kader',
                'idkader' => 18,
            ),
            19 => 
            array (
                'iduser' => 20,
                'username' => 'pagelaran',
                'password' => 'pagelaran',
                'tipe' => 'kader',
                'idkader' => 19,
            ),
            20 => 
            array (
                'iduser' => 21,
                'username' => 'pakis',
                'password' => 'pakis',
                'tipe' => 'kader',
                'idkader' => 20,
            ),
            21 => 
            array (
                'iduser' => 22,
                'username' => 'pakisaji',
                'password' => 'pakisaji',
                'tipe' => 'kader',
                'idkader' => 21,
            ),
            22 => 
            array (
                'iduser' => 23,
                'username' => 'poncokusumo',
                'password' => 'poncokusumo',
                'tipe' => 'kader',
                'idkader' => 22,
            ),
            23 => 
            array (
                'iduser' => 24,
                'username' => 'pujon',
                'password' => 'pujon',
                'tipe' => 'kader',
                'idkader' => 23,
            ),
            24 => 
            array (
                'iduser' => 25,
                'username' => 'singosari',
                'password' => 'singosari',
                'tipe' => 'kader',
                'idkader' => 24,
            ),
            25 => 
            array (
                'iduser' => 26,
                'username' => 'sumawe',
                'password' => 'sumawe',
                'tipe' => 'kader',
                'idkader' => 25,
            ),
            26 => 
            array (
                'iduser' => 27,
                'username' => 'sumberpucung',
                'password' => 'sumberpucung',
                'tipe' => 'kader',
                'idkader' => 26,
            ),
            27 => 
            array (
                'iduser' => 28,
                'username' => 'tajinan',
                'password' => 'tajinan',
                'tipe' => 'kader',
                'idkader' => 27,
            ),
            28 => 
            array (
                'iduser' => 29,
                'username' => 'tirtoyudo',
                'password' => 'tirtoyudo',
                'tipe' => 'kader',
                'idkader' => 28,
            ),
            29 => 
            array (
                'iduser' => 30,
                'username' => 'tumpang',
                'password' => 'tumpang',
                'tipe' => 'kader',
                'idkader' => 29,
            ),
            30 => 
            array (
                'iduser' => 31,
                'username' => 'turen',
                'password' => 'turen',
                'tipe' => 'kader',
                'idkader' => 30,
            ),
            31 => 
            array (
                'iduser' => 32,
                'username' => 'wagir',
                'password' => 'wagir',
                'tipe' => 'kader',
                'idkader' => 31,
            ),
            32 => 
            array (
                'iduser' => 33,
                'username' => 'wajak',
                'password' => 'wajak',
                'tipe' => 'kader',
                'idkader' => 32,
            ),
            33 => 
            array (
                'iduser' => 34,
                'username' => 'wonosari',
                'password' => 'wonosari',
                'tipe' => 'kader',
                'idkader' => 33,
            ),
        ));
        
        
    }
}