<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KecamatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kecamatan')->delete();
        
        \DB::table('kecamatan')->insert(array (
            0 => 
            array (
                'idkecamatan' => 1,
                'namaKec' => 'Ampelgading',
            ),
            1 => 
            array (
                'idkecamatan' => 2,
                'namaKec' => 'Bantur',
            ),
            2 => 
            array (
                'idkecamatan' => 3,
                'namaKec' => 'Bululawang',
            ),
            3 => 
            array (
                'idkecamatan' => 4,
                'namaKec' => 'Dampit',
            ),
            4 => 
            array (
                'idkecamatan' => 5,
                'namaKec' => 'Dau',
            ),
            5 => 
            array (
                'idkecamatan' => 6,
                'namaKec' => 'Donomulyo',
            ),
            6 => 
            array (
                'idkecamatan' => 7,
                'namaKec' => 'Gedangan',
            ),
            7 => 
            array (
                'idkecamatan' => 8,
                'namaKec' => 'Gondanglegi',
            ),
            8 => 
            array (
                'idkecamatan' => 9,
                'namaKec' => 'Jabung',
            ),
            9 => 
            array (
                'idkecamatan' => 10,
                'namaKec' => 'Kalipare',
            ),
            10 => 
            array (
                'idkecamatan' => 11,
                'namaKec' => 'Karangploso',
            ),
            11 => 
            array (
                'idkecamatan' => 12,
                'namaKec' => 'Kasembon',
            ),
            12 => 
            array (
                'idkecamatan' => 13,
                'namaKec' => 'Kepanjen',
            ),
            13 => 
            array (
                'idkecamatan' => 14,
                'namaKec' => 'Kromengan',
            ),
            14 => 
            array (
                'idkecamatan' => 15,
                'namaKec' => 'Lawang',
            ),
            15 => 
            array (
                'idkecamatan' => 16,
                'namaKec' => 'Ngajum',
            ),
            16 => 
            array (
                'idkecamatan' => 17,
                'namaKec' => 'Ngantang',
            ),
            17 => 
            array (
                'idkecamatan' => 18,
                'namaKec' => 'Pagak',
            ),
            18 => 
            array (
                'idkecamatan' => 19,
                'namaKec' => 'Pagelaran',
            ),
            19 => 
            array (
                'idkecamatan' => 20,
                'namaKec' => 'Pakis',
            ),
            20 => 
            array (
                'idkecamatan' => 21,
                'namaKec' => 'Pakisaji',
            ),
            21 => 
            array (
                'idkecamatan' => 22,
                'namaKec' => 'Poncokusumo',
            ),
            22 => 
            array (
                'idkecamatan' => 23,
                'namaKec' => 'Pujon',
            ),
            23 => 
            array (
                'idkecamatan' => 24,
                'namaKec' => 'Singosari',
            ),
            24 => 
            array (
                'idkecamatan' => 25,
                'namaKec' => 'Sumawe',
            ),
            25 => 
            array (
                'idkecamatan' => 26,
                'namaKec' => 'Sumberpucung',
            ),
            26 => 
            array (
                'idkecamatan' => 27,
                'namaKec' => 'Tajinan',
            ),
            27 => 
            array (
                'idkecamatan' => 28,
                'namaKec' => 'Tirtoyudo',
            ),
            28 => 
            array (
                'idkecamatan' => 29,
                'namaKec' => 'Tumpang',
            ),
            29 => 
            array (
                'idkecamatan' => 30,
                'namaKec' => 'Turen',
            ),
            30 => 
            array (
                'idkecamatan' => 31,
                'namaKec' => 'Wagir',
            ),
            31 => 
            array (
                'idkecamatan' => 32,
                'namaKec' => 'Wajak',
            ),
            32 => 
            array (
                'idkecamatan' => 33,
                'namaKec' => 'Wonosari',
            ),
        ));
        
        
    }
}