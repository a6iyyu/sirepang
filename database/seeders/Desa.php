<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Desa extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('desa')->delete();   
        DB::table('desa')->insert([
            0 => 
            [
                'id_desa' => 1,
                'nama_desa' => 'Lebakharjo',
                'id_kecamatan' => 1,
            ],
            1 => 
            [
                'id_desa' => 2,
                'nama_desa' => 'Wirotaman',
                'id_kecamatan' => 1,
            ],
            2 => 
            [
                'id_desa' => 3,
                'nama_desa' => 'Tamanasri',
                'id_kecamatan' => 1,
            ],
            3 => 
            [
                'id_desa' => 4,
                'nama_desa' => 'Sonowangi',
                'id_kecamatan' => 1,
            ],
            4 => 
            [
                'id_desa' => 5,
                'nama_desa' => 'Tirtomarto',
                'id_kecamatan' => 1,
            ],
            5 => 
            [
                'id_desa' => 6,
                'nama_desa' => 'Purwoharjo',
                'id_kecamatan' => 1,
            ],
            6 => 
            [
                'id_desa' => 7,
                'nama_desa' => 'Sidorenggo',
                'id_kecamatan' => 1,
            ],
            7 => 
            [
                'id_desa' => 8,
                'nama_desa' => 'Tirtomoyo',
                'id_kecamatan' => 1,
            ],
            8 => 
            [
                'id_desa' => 9,
                'nama_desa' => 'Tawangagung',
                'id_kecamatan' => 1,
            ],
            9 => 
            [
                'id_desa' => 10,
                'nama_desa' => 'Simojayan',
                'id_kecamatan' => 1,
            ],
            10 => 
            [
                'id_desa' => 11,
                'nama_desa' => 'Argoyuwono',
                'id_kecamatan' => 1,
            ],
            11 => 
            [
                'id_desa' => 12,
                'nama_desa' => 'Mulyosari',
                'id_kecamatan' => 1,
            ],
            12 => 
            [
                'id_desa' => 13,
                'nama_desa' => 'Tamansari',
                'id_kecamatan' => 1,
            ],
            13 => 
            [
                'id_desa' => 14,
                'nama_desa' => 'Bandungrejo',
                'id_kecamatan' => 2,
            ],
            14 => 
            [
                'id_desa' => 15,
                'nama_desa' => 'Sumberbening',
                'id_kecamatan' => 2,
            ],
            15 => 
            [
                'id_desa' => 16,
                'nama_desa' => 'Srigonco',
                'id_kecamatan' => 2,
            ],
            16 => 
            [
                'id_desa' => 17,
                'nama_desa' => 'Wonorejo',
                'id_kecamatan' => 2,
            ],
            17 => 
            [
                'id_desa' => 18,
                'nama_desa' => 'Bantur',
                'id_kecamatan' => 2,
            ],
            18 => 
            [
                'id_desa' => 19,
                'nama_desa' => 'Pringgodani',
                'id_kecamatan' => 2,
            ],
            19 => 
            [
                'id_desa' => 20,
                'nama_desa' => 'Rejosari',
                'id_kecamatan' => 2,
            ],
            20 => 
            [
                'id_desa' => 21,
                'nama_desa' => 'Wonokerto',
                'id_kecamatan' => 2,
            ],
            21 => 
            [
                'id_desa' => 22,
                'nama_desa' => 'Rejoyoso',
                'id_kecamatan' => 2,
            ],
            22 => 
            [
                'id_desa' => 23,
                'nama_desa' => 'Karangsari',
                'id_kecamatan' => 2,
            ],
            23 => 
            [
                'id_desa' => 24,
                'nama_desa' => 'Sukonolo',
                'id_kecamatan' => 3,
            ],
            24 => 
            [
                'id_desa' => 25,
                'nama_desa' => 'Gading',
                'id_kecamatan' => 3,
            ],
            25 => 
            [
                'id_desa' => 26,
                'nama_desa' => 'Krebet',
                'id_kecamatan' => 3,
            ],
            26 => 
            [
                'id_desa' => 27,
                'nama_desa' => 'Bakalan',
                'id_kecamatan' => 3,
            ],
            27 => 
            [
                'id_desa' => 28,
                'nama_desa' => 'Sudimoro',
                'id_kecamatan' => 3,
            ],
            28 => 
            [
                'id_desa' => 29,
                'nama_desa' => 'Kasri',
                'id_kecamatan' => 3,
            ],
            29 => 
            [
                'id_desa' => 30,
                'nama_desa' => 'Pringu',
                'id_kecamatan' => 3,
            ],
            30 => 
            [
                'id_desa' => 31,
                'nama_desa' => 'Kasembon',
                'id_kecamatan' => 3,
            ],
            31 => 
            [
                'id_desa' => 32,
                'nama_desa' => 'Kuwolu',
                'id_kecamatan' => 3,
            ],
            32 => 
            [
                'id_desa' => 33,
                'nama_desa' => 'Krebetsenggrong',
                'id_kecamatan' => 3,
            ],
            33 => 
            [
                'id_desa' => 34,
                'nama_desa' => 'Lumbangsari',
                'id_kecamatan' => 3,
            ],
            34 => 
            [
                'id_desa' => 35,
                'nama_desa' => 'Wandanpuro',
                'id_kecamatan' => 3,
            ],
            35 => 
            [
                'id_desa' => 36,
                'nama_desa' => 'Bululawang',
                'id_kecamatan' => 3,
            ],
            36 => 
            [
                'id_desa' => 37,
                'nama_desa' => 'Sempalwadak',
                'id_kecamatan' => 3,
            ],
            37 => 
            [
                'id_desa' => 38,
                'nama_desa' => 'Dampit',
                'id_kecamatan' => 4,
            ],
            38 => 
            [
                'id_desa' => 39,
                'nama_desa' => 'Sukodono',
                'id_kecamatan' => 4,
            ],
            39 => 
            [
                'id_desa' => 40,
                'nama_desa' => 'Srimulyo',
                'id_kecamatan' => 4,
            ],
            40 => 
            [
                'id_desa' => 41,
                'nama_desa' => 'Baturetno',
                'id_kecamatan' => 4,
            ],
            41 => 
            [
                'id_desa' => 42,
                'nama_desa' => 'Bumirejo',
                'id_kecamatan' => 4,
            ],
            42 => 
            [
                'id_desa' => 43,
                'nama_desa' => 'Sumbersuko',
                'id_kecamatan' => 4,
            ],
            43 => 
            [
                'id_desa' => 44,
                'nama_desa' => 'Amadanom',
                'id_kecamatan' => 4,
            ],
            44 => 
            [
                'id_desa' => 45,
                'nama_desa' => 'Pamotan',
                'id_kecamatan' => 4,
            ],
            45 => 
            [
                'id_desa' => 46,
                'nama_desa' => 'Majangtengah',
                'id_kecamatan' => 4,
            ],
            46 => 
            [
                'id_desa' => 47,
                'nama_desa' => 'Rembun',
                'id_kecamatan' => 4,
            ],
            47 => 
            [
                'id_desa' => 48,
                'nama_desa' => 'Pojok',
                'id_kecamatan' => 4,
            ],
            48 => 
            [
                'id_desa' => 49,
                'nama_desa' => 'Jambangan',
                'id_kecamatan' => 4,
            ],
            49 => 
            [
                'id_desa' => 50,
                'nama_desa' => 'Kucur',
                'id_kecamatan' => 5,
            ],
            50 => 
            [
                'id_desa' => 51,
                'nama_desa' => 'Kalisongo',
                'id_kecamatan' => 5,
            ],
            51 => 
            [
                'id_desa' => 52,
                'nama_desa' => 'Karangwidoro',
                'id_kecamatan' => 5,
            ],
            52 => 
            [
                'id_desa' => 53,
                'nama_desa' => 'Petungsewu',
                'id_kecamatan' => 5,
            ],
            53 => 
            [
                'id_desa' => 54,
                'nama_desa' => 'Selorejo',
                'id_kecamatan' => 5,
            ],
            54 => 
            [
                'id_desa' => 55,
                'nama_desa' => 'Tegalwaru',
                'id_kecamatan' => 5,
            ],
            55 => 
            [
                'id_desa' => 56,
                'nama_desa' => 'Landungsari',
                'id_kecamatan' => 5,
            ],
            56 => 
            [
                'id_desa' => 57,
                'nama_desa' => 'Mulyoagung',
                'id_kecamatan' => 5,
            ],
            57 => 
            [
                'id_desa' => 58,
                'nama_desa' => 'Gadingkulon',
                'id_kecamatan' => 5,
            ],
            58 => 
            [
                'id_desa' => 59,
                'nama_desa' => 'Sumbersekar',
                'id_kecamatan' => 5,
            ],
            59 => 
            [
                'id_desa' => 60,
                'nama_desa' => 'Sumberoto',
                'id_kecamatan' => 6,
            ],
            60 => 
            [
                'id_desa' => 61,
                'nama_desa' => 'Purworejo',
                'id_kecamatan' => 6,
            ],
            61 => 
            [
                'id_desa' => 62,
                'nama_desa' => 'Donomulyo',
                'id_kecamatan' => 6,
            ],
            62 => 
            [
                'id_desa' => 63,
                'nama_desa' => 'Tempursari',
                'id_kecamatan' => 6,
            ],
            63 => 
            [
                'id_desa' => 64,
                'nama_desa' => 'Tlogosari',
                'id_kecamatan' => 6,
            ],
            64 => 
            [
                'id_desa' => 65,
                'nama_desa' => 'Kedungsalam',
                'id_kecamatan' => 6,
            ],
            65 => 
            [
                'id_desa' => 66,
                'nama_desa' => 'Banjarejo',
                'id_kecamatan' => 6,
            ],
            66 => 
            [
                'id_desa' => 67,
                'nama_desa' => 'Tulungrejo',
                'id_kecamatan' => 6,
            ],
            67 => 
            [
                'id_desa' => 68,
                'nama_desa' => 'Tumpakrejo',
                'id_kecamatan' => 7,
            ],
            68 => 
            [
                'id_desa' => 69,
                'nama_desa' => 'Sindurejo',
                'id_kecamatan' => 7,
            ],
            69 => 
            [
                'id_desa' => 70,
                'nama_desa' => 'Gajahrejo',
                'id_kecamatan' => 7,
            ],
            70 => 
            [
                'id_desa' => 71,
                'nama_desa' => 'Sidodadi',
                'id_kecamatan' => 7,
            ],
            71 => 
            [
                'id_desa' => 72,
                'nama_desa' => 'Gedangan',
                'id_kecamatan' => 7,
            ],
            72 => 
            [
                'id_desa' => 73,
                'nama_desa' => 'Segaran',
                'id_kecamatan' => 7,
            ],
            73 => 
            [
                'id_desa' => 74,
                'nama_desa' => 'Sumberejo',
                'id_kecamatan' => 7,
            ],
            74 => 
            [
                'id_desa' => 75,
                'nama_desa' => 'Sukorejo',
                'id_kecamatan' => 8,
            ],
            75 => 
            [
                'id_desa' => 76,
                'nama_desa' => 'Bulupitu',
                'id_kecamatan' => 8,
            ],
            76 => 
            [
                'id_desa' => 77,
                'nama_desa' => 'Sukosari',
                'id_kecamatan' => 8,
            ],
            77 => 
            [
                'id_desa' => 78,
                'nama_desa' => 'Panggungrejo',
                'id_kecamatan' => 8,
            ],
            78 => 
            [
                'id_desa' => 79,
                'nama_desa' => 'Gondanglegi Kulon',
                'id_kecamatan' => 8,
            ],
            79 => 
            [
                'id_desa' => 80,
                'nama_desa' => 'Gondanglegi Wetan',
                'id_kecamatan' => 8,
            ],
            80 => 
            [
                'id_desa' => 81,
                'nama_desa' => 'Putat Kidul',
                'id_kecamatan' => 8,
            ],
            81 => 
            [
                'id_desa' => 82,
                'nama_desa' => 'Putat Lor',
                'id_kecamatan' => 8,
            ],
            82 => 
            [
                'id_desa' => 83,
                'nama_desa' => 'Sepanjang',
                'id_kecamatan' => 8,
            ],
            83 => 
            [
                'id_desa' => 84,
                'nama_desa' => 'Urekurek',
                'id_kecamatan' => 8,
            ],
            84 => 
            [
                'id_desa' => 85,
                'nama_desa' => 'Ketawang',
                'id_kecamatan' => 8,
            ],
            85 => 
            [
                'id_desa' => 86,
                'nama_desa' => 'Ganjaran',
                'id_kecamatan' => 8,
            ],
            86 => 
            [
                'id_desa' => 87,
                'nama_desa' => 'Putukrejo',
                'id_kecamatan' => 8,
            ],
            87 => 
            [
                'id_desa' => 88,
                'nama_desa' => 'Sumberjaya',
                'id_kecamatan' => 8,
            ],
            88 => 
            [
                'id_desa' => 89,
                'nama_desa' => 'Kenongo',
                'id_kecamatan' => 9,
            ],
            89 => 
            [
                'id_desa' => 90,
                'nama_desa' => 'Ngadirejo',
                'id_kecamatan' => 9,
            ],
            90 => 
            [
                'id_desa' => 91,
                'nama_desa' => 'Taji',
                'id_kecamatan' => 9,
            ],
            91 => 
            [
                'id_desa' => 92,
                'nama_desa' => 'Pandansari Lor',
                'id_kecamatan' => 9,
            ],
            92 => 
            [
                'id_desa' => 93,
                'nama_desa' => 'Sukopuro',
                'id_kecamatan' => 9,
            ],
            93 => 
            [
                'id_desa' => 94,
                'nama_desa' => 'Sidorejo',
                'id_kecamatan' => 9,
            ],
            94 => 
            [
                'id_desa' => 95,
                'nama_desa' => 'Sukolilo',
                'id_kecamatan' => 9,
            ],
            95 => 
            [
                'id_desa' => 96,
                'nama_desa' => 'Sidomulyo',
                'id_kecamatan' => 9,
            ],
            96 => 
            [
                'id_desa' => 97,
                'nama_desa' => 'Gadingkembar',
                'id_kecamatan' => 9,
            ],
            97 => 
            [
                'id_desa' => 98,
                'nama_desa' => 'Kemantren',
                'id_kecamatan' => 9,
            ],
            98 => 
            [
                'id_desa' => 99,
                'nama_desa' => 'Argosari',
                'id_kecamatan' => 9,
            ],
            99 => 
            [
                'id_desa' => 100,
                'nama_desa' => 'Slamparejo',
                'id_kecamatan' => 9,
            ],
            100 => 
            [
                'id_desa' => 101,
                'nama_desa' => 'Kemiri',
                'id_kecamatan' => 9,
            ],
            101 => 
            [
                'id_desa' => 102,
                'nama_desa' => 'Jabung',
                'id_kecamatan' => 9,
            ],
            102 => 
            [
                'id_desa' => 103,
                'nama_desa' => 'Gunungjati',
                'id_kecamatan' => 9,
            ],
            103 => 
            [
                'id_desa' => 104,
                'nama_desa' => 'Arjosari',
                'id_kecamatan' => 10,
            ],
            104 => 
            [
                'id_desa' => 105,
                'nama_desa' => 'Tumpakrejo',
                'id_kecamatan' => 10,
            ],
            105 => 
            [
                'id_desa' => 106,
                'nama_desa' => 'Putukrejo',
                'id_kecamatan' => 10,
            ],
            106 => 
            [
                'id_desa' => 107,
                'nama_desa' => 'Sumberpetung',
                'id_kecamatan' => 10,
            ],
            107 => 
            [
                'id_desa' => 108,
                'nama_desa' => 'Kalipare',
                'id_kecamatan' => 10,
            ],
            108 => 
            [
                'id_desa' => 109,
                'nama_desa' => 'Sukowilangun',
                'id_kecamatan' => 10,
            ],
            109 => 
            [
                'id_desa' => 110,
                'nama_desa' => 'Arjowinangun',
                'id_kecamatan' => 10,
            ],
            110 => 
            [
                'id_desa' => 111,
                'nama_desa' => 'Kalirejo',
                'id_kecamatan' => 10,
            ],
            111 => 
            [
                'id_desa' => 112,
                'nama_desa' => 'Kaliasri',
                'id_kecamatan' => 10,
            ],
            112 => 
            [
                'id_desa' => 113,
                'nama_desa' => 'Tegalgondo',
                'id_kecamatan' => 11,
            ],
            113 => 
            [
                'id_desa' => 114,
                'nama_desa' => 'Kepuharjo',
                'id_kecamatan' => 11,
            ],
            114 => 
            [
                'id_desa' => 115,
                'nama_desa' => 'Ngenep',
                'id_kecamatan' => 11,
            ],
            115 => 
            [
                'id_desa' => 116,
                'nama_desa' => 'Ngijo',
                'id_kecamatan' => 11,
            ],
            116 => 
            [
                'id_desa' => 117,
                'nama_desa' => 'Ampeldento',
                'id_kecamatan' => 11,
            ],
            117 => 
            [
                'id_desa' => 118,
                'nama_desa' => 'Girimoyo',
                'id_kecamatan' => 11,
            ],
            118 => 
            [
                'id_desa' => 119,
                'nama_desa' => 'Bocek',
                'id_kecamatan' => 11,
            ],
            119 => 
            [
                'id_desa' => 120,
                'nama_desa' => 'Donowarih',
                'id_kecamatan' => 11,
            ],
            120 => 
            [
                'id_desa' => 121,
                'nama_desa' => 'Tawangargo',
                'id_kecamatan' => 11,
            ],
            121 => 
            [
                'id_desa' => 122,
                'nama_desa' => 'Pondokagung',
                'id_kecamatan' => 12,
            ],
            122 => 
            [
                'id_desa' => 123,
                'nama_desa' => 'Bayem',
                'id_kecamatan' => 12,
            ],
            123 => 
            [
                'id_desa' => 124,
                'nama_desa' => 'Pait',
                'id_kecamatan' => 12,
            ],
            124 => 
            [
                'id_desa' => 125,
                'nama_desa' => 'Wonoagung',
                'id_kecamatan' => 12,
            ],
            125 => 
            [
                'id_desa' => 126,
                'nama_desa' => 'Kasembon',
                'id_kecamatan' => 12,
            ],
            126 => 
            [
                'id_desa' => 127,
                'nama_desa' => 'Sukosari',
                'id_kecamatan' => 12,
            ],
            127 => 
            [
                'id_desa' => 128,
                'nama_desa' => 'Kepanjen',
                'id_kecamatan' => 13,
            ],
            128 => 
            [
                'id_desa' => 129,
                'nama_desa' => 'Ardirejo',
                'id_kecamatan' => 13,
            ],
            129 => 
            [
                'id_desa' => 130,
                'nama_desa' => 'Cepokomulyo',
                'id_kecamatan' => 13,
            ],
            130 => 
            [
                'id_desa' => 131,
                'nama_desa' => 'Penarukan',
                'id_kecamatan' => 13,
            ],
            131 => 
            [
                'id_desa' => 132,
                'nama_desa' => 'Jenggolo',
                'id_kecamatan' => 13,
            ],
            132 => 
            [
                'id_desa' => 133,
                'nama_desa' => 'Sengguruh',
                'id_kecamatan' => 13,
            ],
            133 => 
            [
                'id_desa' => 134,
                'nama_desa' => 'Kemiri',
                'id_kecamatan' => 13,
            ],
            134 => 
            [
                'id_desa' => 135,
                'nama_desa' => 'Tegalsari',
                'id_kecamatan' => 13,
            ],
            135 => 
            [
                'id_desa' => 136,
                'nama_desa' => 'Mangunrejo',
                'id_kecamatan' => 13,
            ],
            136 => 
            [
                'id_desa' => 137,
                'nama_desa' => 'Panggungrejo',
                'id_kecamatan' => 13,
            ],
            137 => 
            [
                'id_desa' => 138,
                'nama_desa' => 'Kedung Pedaringan',
                'id_kecamatan' => 13,
            ],
            138 => 
            [
                'id_desa' => 139,
                'nama_desa' => 'Talangagung',
                'id_kecamatan' => 13,
            ],
            139 => 
            [
                'id_desa' => 140,
                'nama_desa' => 'Dilem',
                'id_kecamatan' => 13,
            ],
            140 => 
            [
                'id_desa' => 141,
                'nama_desa' => 'Sukoraharjo',
                'id_kecamatan' => 13,
            ],
            141 => 
            [
                'id_desa' => 142,
                'nama_desa' => 'Curungrejo',
                'id_kecamatan' => 13,
            ],
            142 => 
            [
                'id_desa' => 143,
                'nama_desa' => 'Jatirejoyoso',
                'id_kecamatan' => 13,
            ],
            143 => 
            [
                'id_desa' => 144,
                'nama_desa' => 'Ngadilangkung',
                'id_kecamatan' => 13,
            ],
            144 => 
            [
                'id_desa' => 145,
                'nama_desa' => 'Mojosari',
                'id_kecamatan' => 13,
            ],
            145 => 
            [
                'id_desa' => 146,
                'nama_desa' => 'Slorok',
                'id_kecamatan' => 14,
            ],
            146 => 
            [
                'id_desa' => 147,
                'nama_desa' => 'Jatikerto',
                'id_kecamatan' => 14,
            ],
            147 => 
            [
                'id_desa' => 148,
                'nama_desa' => 'Ngadirejo',
                'id_kecamatan' => 14,
            ],
            148 => 
            [
                'id_desa' => 149,
                'nama_desa' => 'Kromengan',
                'id_kecamatan' => 14,
            ],
            149 => 
            [
                'id_desa' => 150,
                'nama_desa' => 'Peniwen',
                'id_kecamatan' => 14,
            ],
            150 => 
            [
                'id_desa' => 151,
                'nama_desa' => 'Jambuwer',
                'id_kecamatan' => 14,
            ],
            151 => 
            [
                'id_desa' => 152,
                'nama_desa' => 'Karangrejo',
                'id_kecamatan' => 14,
            ],
            152 => 
            [
                'id_desa' => 153,
                'nama_desa' => 'Lawang',
                'id_kecamatan' => 15,
            ],
            153 => 
            [
                'id_desa' => 154,
                'nama_desa' => 'Kalirejo',
                'id_kecamatan' => 15,
            ],
            154 => 
            [
                'id_desa' => 155,
                'nama_desa' => 'Sidoluhur',
                'id_kecamatan' => 15,
            ],
            155 => 
            [
                'id_desa' => 156,
                'nama_desa' => 'Srigading',
                'id_kecamatan' => 15,
            ],
            156 => 
            [
                'id_desa' => 157,
                'nama_desa' => 'Sidodadi',
                'id_kecamatan' => 15,
            ],
            157 => 
            [
                'id_desa' => 158,
                'nama_desa' => 'Bedali',
                'id_kecamatan' => 15,
            ],
            158 => 
            [
                'id_desa' => 159,
                'nama_desa' => 'Mulyoarjo',
                'id_kecamatan' => 15,
            ],
            159 => 
            [
                'id_desa' => 160,
                'nama_desa' => 'Sumberngepoh',
                'id_kecamatan' => 15,
            ],
            160 => 
            [
                'id_desa' => 161,
                'nama_desa' => 'Sumberporong',
                'id_kecamatan' => 15,
            ],
            161 => 
            [
                'id_desa' => 162,
                'nama_desa' => 'Turirejo',
                'id_kecamatan' => 15,
            ],
            162 => 
            [
                'id_desa' => 163,
                'nama_desa' => 'Ketindan',
                'id_kecamatan' => 15,
            ],
            163 => 
            [
                'id_desa' => 164,
                'nama_desa' => 'Wonorejo',
                'id_kecamatan' => 15,
            ],
            164 => 
            [
                'id_desa' => 165,
                'nama_desa' => 'Ngajum',
                'id_kecamatan' => 16,
            ],
            165 => 
            [
                'id_desa' => 166,
                'nama_desa' => 'Palaan',
                'id_kecamatan' => 16,
            ],
            166 => 
            [
                'id_desa' => 167,
                'nama_desa' => 'Ngasem',
                'id_kecamatan' => 16,
            ],
            167 => 
            [
                'id_desa' => 168,
                'nama_desa' => 'Banjarsari',
                'id_kecamatan' => 16,
            ],
            168 => 
            [
                'id_desa' => 169,
                'nama_desa' => 'Kranggan',
                'id_kecamatan' => 16,
            ],
            169 => 
            [
                'id_desa' => 170,
                'nama_desa' => 'Kesamben',
                'id_kecamatan' => 16,
            ],
            170 => 
            [
                'id_desa' => 171,
                'nama_desa' => 'Babadan',
                'id_kecamatan' => 16,
            ],
            171 => 
            [
                'id_desa' => 172,
                'nama_desa' => 'Balesari',
                'id_kecamatan' => 16,
            ],
            172 => 
            [
                'id_desa' => 173,
                'nama_desa' => 'Maguan',
                'id_kecamatan' => 16,
            ],
            173 => 
            [
                'id_desa' => 174,
                'nama_desa' => 'Pagersari',
                'id_kecamatan' => 17,
            ],
            174 => 
            [
                'id_desa' => 175,
                'nama_desa' => 'Sidodadi',
                'id_kecamatan' => 17,
            ],
            175 => 
            [
                'id_desa' => 176,
                'nama_desa' => 'Banjarejo',
                'id_kecamatan' => 17,
            ],
            176 => 
            [
                'id_desa' => 177,
                'nama_desa' => 'Purworejo',
                'id_kecamatan' => 17,
            ],
            177 => 
            [
                'id_desa' => 178,
                'nama_desa' => 'Ngantru',
                'id_kecamatan' => 17,
            ],
            178 => 
            [
                'id_desa' => 179,
                'nama_desa' => 'Banturejo',
                'id_kecamatan' => 17,
            ],
            179 => 
            [
                'id_desa' => 180,
                'nama_desa' => 'Pandansari',
                'id_kecamatan' => 17,
            ],
            180 => 
            [
                'id_desa' => 181,
                'nama_desa' => 'Mulyorejo',
                'id_kecamatan' => 17,
            ],
            181 => 
            [
                'id_desa' => 182,
                'nama_desa' => 'Sumberagung',
                'id_kecamatan' => 17,
            ],
            182 => 
            [
                'id_desa' => 183,
                'nama_desa' => 'Kaumrejo',
                'id_kecamatan' => 17,
            ],
            183 => 
            [
                'id_desa' => 184,
                'nama_desa' => 'Tulungrejo',
                'id_kecamatan' => 17,
            ],
            184 => 
            [
                'id_desa' => 185,
                'nama_desa' => 'Waturejo',
                'id_kecamatan' => 17,
            ],
            185 => 
            [
                'id_desa' => 186,
                'nama_desa' => 'Jombok',
                'id_kecamatan' => 17,
            ],
            186 => 
            [
                'id_desa' => 187,
                'nama_desa' => 'Sumbermanjing Kulon',
                'id_kecamatan' => 18,
            ],
            187 => 
            [
                'id_desa' => 188,
                'nama_desa' => 'Pandanrejo',
                'id_kecamatan' => 18,
            ],
            188 => 
            [
                'id_desa' => 189,
                'nama_desa' => 'Sumberkerto',
                'id_kecamatan' => 18,
            ],
            189 => 
            [
                'id_desa' => 190,
                'nama_desa' => 'Sempol',
                'id_kecamatan' => 18,
            ],
            190 => 
            [
                'id_desa' => 191,
                'nama_desa' => 'Pagak',
                'id_kecamatan' => 18,
            ],
            191 => 
            [
                'id_desa' => 192,
                'nama_desa' => 'Sumberejo',
                'id_kecamatan' => 18,
            ],
            192 => 
            [
                'id_desa' => 193,
                'nama_desa' => 'Gampingan',
                'id_kecamatan' => 18,
            ],
            193 => 
            [
                'id_desa' => 194,
                'nama_desa' => 'Tlogorejo',
                'id_kecamatan' => 18,
            ],
            194 => 
            [
                'id_desa' => 195,
                'nama_desa' => 'Kanigoro',
                'id_kecamatan' => 19,
            ],
            195 => 
            [
                'id_desa' => 196,
                'nama_desa' => 'Balearjo',
                'id_kecamatan' => 19,
            ],
            196 => 
            [
                'id_desa' => 197,
                'nama_desa' => 'Kademangan',
                'id_kecamatan' => 19,
            ],
            197 => 
            [
                'id_desa' => 198,
                'nama_desa' => 'Suwaru',
                'id_kecamatan' => 19,
            ],
            198 => 
            [
                'id_desa' => 199,
                'nama_desa' => 'Clumprit',
                'id_kecamatan' => 19,
            ],
            199 => 
            [
                'id_desa' => 200,
                'nama_desa' => 'Sidorejo',
                'id_kecamatan' => 19,
            ],
            200 => 
            [
                'id_desa' => 201,
                'nama_desa' => 'Pagelaran',
                'id_kecamatan' => 19,
            ],
            201 => 
            [
                'id_desa' => 202,
                'nama_desa' => 'Banjarejo',
                'id_kecamatan' => 19,
            ],
            202 => 
            [
                'id_desa' => 203,
                'nama_desa' => 'Brongkal',
                'id_kecamatan' => 19,
            ],
            203 => 
            [
                'id_desa' => 204,
                'nama_desa' => 'Karangsuko',
                'id_kecamatan' => 19,
            ],
            204 => 
            [
                'id_desa' => 205,
                'nama_desa' => 'Sekarpuro',
                'id_kecamatan' => 20,
            ],
            205 => 
            [
                'id_desa' => 206,
                'nama_desa' => 'Ampeldento',
                'id_kecamatan' => 20,
            ],
            206 => 
            [
                'id_desa' => 207,
                'nama_desa' => 'Sumber Kradenan',
                'id_kecamatan' => 20,
            ],
            207 => 
            [
                'id_desa' => 208,
                'nama_desa' => 'Kedungrejo',
                'id_kecamatan' => 20,
            ],
            208 => 
            [
                'id_desa' => 209,
                'nama_desa' => 'Banjarejo',
                'id_kecamatan' => 20,
            ],
            209 => 
            [
                'id_desa' => 210,
                'nama_desa' => 'Pucangsongo',
                'id_kecamatan' => 20,
            ],
            210 => 
            [
                'id_desa' => 211,
                'nama_desa' => 'Sukoanyar',
                'id_kecamatan' => 20,
            ],
            211 => 
            [
                'id_desa' => 212,
                'nama_desa' => 'Sumberpasir',
                'id_kecamatan' => 20,
            ],
            212 => 
            [
                'id_desa' => 213,
                'nama_desa' => 'Pakiskembar',
                'id_kecamatan' => 20,
            ],
            213 => 
            [
                'id_desa' => 214,
                'nama_desa' => 'Pakisjajar',
                'id_kecamatan' => 20,
            ],
            214 => 
            [
                'id_desa' => 215,
                'nama_desa' => 'Bunut Wetan',
                'id_kecamatan' => 20,
            ],
            215 => 
            [
                'id_desa' => 216,
                'nama_desa' => 'Asrikaton',
                'id_kecamatan' => 20,
            ],
            216 => 
            [
                'id_desa' => 217,
                'nama_desa' => 'Saptorenggo',
                'id_kecamatan' => 20,
            ],
            217 => 
            [
                'id_desa' => 218,
                'nama_desa' => 'Mangliawan',
                'id_kecamatan' => 20,
            ],
            218 => 
            [
                'id_desa' => 219,
                'nama_desa' => 'Tirtomoyo',
                'id_kecamatan' => 20,
            ],
            219 => 
            [
                'id_desa' => 220,
                'nama_desa' => 'Permanu',
                'id_kecamatan' => 21,
            ],
            220 => 
            [
                'id_desa' => 221,
                'nama_desa' => 'Karangpandan',
                'id_kecamatan' => 21,
            ],
            221 => 
            [
                'id_desa' => 222,
                'nama_desa' => 'Glanggang',
                'id_kecamatan' => 21,
            ],
            222 => 
            [
                'id_desa' => 223,
                'nama_desa' => 'Sutojayan',
                'id_kecamatan' => 21,
            ],
            223 => 
            [
                'id_desa' => 224,
                'nama_desa' => 'Wonokerso',
                'id_kecamatan' => 21,
            ],
            224 => 
            [
                'id_desa' => 225,
                'nama_desa' => 'Karangduren',
                'id_kecamatan' => 21,
            ],
            225 => 
            [
                'id_desa' => 226,
                'nama_desa' => 'Pakisaji',
                'id_kecamatan' => 21,
            ],
            226 => 
            [
                'id_desa' => 227,
                'nama_desa' => 'Jatisari',
                'id_kecamatan' => 21,
            ],
            227 => 
            [
                'id_desa' => 228,
                'nama_desa' => 'Wadung',
                'id_kecamatan' => 21,
            ],
            228 => 
            [
                'id_desa' => 229,
                'nama_desa' => 'Genengan',
                'id_kecamatan' => 21,
            ],
            229 => 
            [
                'id_desa' => 230,
                'nama_desa' => 'Kebonagung',
                'id_kecamatan' => 21,
            ],
            230 => 
            [
                'id_desa' => 231,
                'nama_desa' => 'Kendalpayak',
                'id_kecamatan' => 21,
            ],
            231 => 
            [
                'id_desa' => 232,
                'nama_desa' => 'Dawuhan',
                'id_kecamatan' => 22,
            ],
            232 => 
            [
                'id_desa' => 233,
                'nama_desa' => 'Sumberejo',
                'id_kecamatan' => 22,
            ],
            233 => 
            [
                'id_desa' => 234,
                'nama_desa' => 'Pandansari',
                'id_kecamatan' => 22,
            ],
            234 => 
            [
                'id_desa' => 235,
                'nama_desa' => 'Ngadireso',
                'id_kecamatan' => 22,
            ],
            235 => 
            [
                'id_desa' => 236,
                'nama_desa' => 'Karanganyar',
                'id_kecamatan' => 22,
            ],
            236 => 
            [
                'id_desa' => 237,
                'nama_desa' => 'Jambesari',
                'id_kecamatan' => 22,
            ],
            237 => 
            [
                'id_desa' => 238,
                'nama_desa' => 'Pajaran',
                'id_kecamatan' => 22,
            ],
            238 => 
            [
                'id_desa' => 239,
                'nama_desa' => 'Argosuko',
                'id_kecamatan' => 22,
            ],
            239 => 
            [
                'id_desa' => 240,
                'nama_desa' => 'Ngebruk',
                'id_kecamatan' => 22,
            ],
            240 => 
            [
                'id_desa' => 241,
                'nama_desa' => 'Karangnongko',
                'id_kecamatan' => 22,
            ],
            241 => 
            [
                'id_desa' => 242,
                'nama_desa' => 'Wonomulyo',
                'id_kecamatan' => 22,
            ],
            242 => 
            [
                'id_desa' => 243,
                'nama_desa' => 'Belung',
                'id_kecamatan' => 22,
            ],
            243 => 
            [
                'id_desa' => 244,
                'nama_desa' => 'Wonorejo',
                'id_kecamatan' => 22,
            ],
            244 => 
            [
                'id_desa' => 245,
                'nama_desa' => 'Poncokusumo',
                'id_kecamatan' => 22,
            ],
            245 => 
            [
                'id_desa' => 246,
                'nama_desa' => 'Wringinanom',
                'id_kecamatan' => 22,
            ],
            246 => 
            [
                'id_desa' => 247,
                'nama_desa' => 'Gubugklakah',
                'id_kecamatan' => 22,
            ],
            247 => 
            [
                'id_desa' => 248,
                'nama_desa' => 'Ngadas',
                'id_kecamatan' => 22,
            ],
            248 => 
            [
                'id_desa' => 249,
                'nama_desa' => 'Bendosari',
                'id_kecamatan' => 23,
            ],
            249 => 
            [
                'id_desa' => 250,
                'nama_desa' => 'Sukomulyo',
                'id_kecamatan' => 23,
            ],
            250 => 
            [
                'id_desa' => 251,
                'nama_desa' => 'Pujon Kidul',
                'id_kecamatan' => 23,
            ],
            251 => 
            [
                'id_desa' => 252,
                'nama_desa' => 'Pujon Lor',
                'id_kecamatan' => 23,
            ],
            252 => 
            [
                'id_desa' => 253,
                'nama_desa' => 'Pandensari',
                'id_kecamatan' => 23,
            ],
            253 => 
            [
                'id_desa' => 254,
                'nama_desa' => 'Ngroto',
                'id_kecamatan' => 23,
            ],
            254 => 
            [
                'id_desa' => 255,
                'nama_desa' => 'Ngabab',
                'id_kecamatan' => 23,
            ],
            255 => 
            [
                'id_desa' => 256,
                'nama_desa' => 'Tawangsari',
                'id_kecamatan' => 23,
            ],
            256 => 
            [
                'id_desa' => 257,
                'nama_desa' => 'Madiredo',
                'id_kecamatan' => 23,
            ],
            257 => 
            [
                'id_desa' => 258,
                'nama_desa' => 'Wiyurejo',
                'id_kecamatan' => 23,
            ],
            258 => 
            [
                'id_desa' => 259,
                'nama_desa' => 'Losari',
                'id_kecamatan' => 24,
            ],
            259 => 
            [
                'id_desa' => 260,
                'nama_desa' => 'Pagentan',
                'id_kecamatan' => 24,
            ],
            260 => 
            [
                'id_desa' => 261,
                'nama_desa' => 'Candirenggo',
                'id_kecamatan' => 24,
            ],
            261 => 
            [
                'id_desa' => 262,
                'nama_desa' => 'Langlang',
                'id_kecamatan' => 24,
            ],
            262 => 
            [
                'id_desa' => 263,
                'nama_desa' => 'Tunjungtirto',
                'id_kecamatan' => 24,
            ],
            263 => 
            [
                'id_desa' => 264,
                'nama_desa' => 'Banjararum',
                'id_kecamatan' => 24,
            ],
            264 => 
            [
                'id_desa' => 265,
                'nama_desa' => 'Watugede',
                'id_kecamatan' => 24,
            ],
            265 => 
            [
                'id_desa' => 266,
                'nama_desa' => 'Dengkol',
                'id_kecamatan' => 24,
            ],
            266 => 
            [
                'id_desa' => 267,
                'nama_desa' => 'Wonorejo',
                'id_kecamatan' => 24,
            ],
            267 => 
            [
                'id_desa' => 268,
                'nama_desa' => 'Baturetno',
                'id_kecamatan' => 24,
            ],
            268 => 
            [
                'id_desa' => 269,
                'nama_desa' => 'Tamanharjo',
                'id_kecamatan' => 24,
            ],
            269 => 
            [
                'id_desa' => 270,
                'nama_desa' => 'Purwoasri',
                'id_kecamatan' => 24,
            ],
            270 => 
            [
                'id_desa' => 271,
                'nama_desa' => 'Klampok',
                'id_kecamatan' => 24,
            ],
            271 => 
            [
                'id_desa' => 272,
                'nama_desa' => 'Gunungrejo',
                'id_kecamatan' => 24,
            ],
            272 => 
            [
                'id_desa' => 273,
                'nama_desa' => 'Ardimulyo',
                'id_kecamatan' => 24,
            ],
            273 => 
            [
                'id_desa' => 274,
                'nama_desa' => 'Randuagung',
                'id_kecamatan' => 24,
            ],
            274 => 
            [
                'id_desa' => 275,
                'nama_desa' => 'Toyomarto',
                'id_kecamatan' => 24,
            ],
            275 => 
            [
                'id_desa' => 276,
                'nama_desa' => 'Sitiarjo',
                'id_kecamatan' => 25,
            ],
            276 => 
            [
                'id_desa' => 277,
                'nama_desa' => 'Tambakrejo',
                'id_kecamatan' => 25,
            ],
            277 => 
            [
                'id_desa' => 278,
                'nama_desa' => 'Kedungbanteng',
                'id_kecamatan' => 25,
            ],
            278 => 
            [
                'id_desa' => 279,
                'nama_desa' => 'Tambakasri',
                'id_kecamatan' => 25,
            ],
            279 => 
            [
                'id_desa' => 280,
                'nama_desa' => 'Tegalrejo',
                'id_kecamatan' => 25,
            ],
            280 => 
            [
                'id_desa' => 281,
                'nama_desa' => 'Ringinkembar',
                'id_kecamatan' => 25,
            ],
            281 => 
            [
                'id_desa' => 282,
                'nama_desa' => 'Sumberagung',
                'id_kecamatan' => 25,
            ],
            282 => 
            [
                'id_desa' => 283,
                'nama_desa' => 'Harjokuncaran',
                'id_kecamatan' => 25,
            ],
            283 => 
            [
                'id_desa' => 284,
                'nama_desa' => 'Argotirto',
                'id_kecamatan' => 25,
            ],
            284 => 
            [
                'id_desa' => 285,
                'nama_desa' => 'Ringinsari',
                'id_kecamatan' => 25,
            ],
            285 => 
            [
                'id_desa' => 286,
                'nama_desa' => 'Druju',
                'id_kecamatan' => 25,
            ],
            286 => 
            [
                'id_desa' => 287,
                'nama_desa' => 'Sumbermanjing Wetan',
                'id_kecamatan' => 25,
            ],
            287 => 
            [
                'id_desa' => 288,
                'nama_desa' => 'Klepu',
                'id_kecamatan' => 25,
            ],
            288 => 
            [
                'id_desa' => 289,
                'nama_desa' => 'Sekarbanyu',
                'id_kecamatan' => 25,
            ],
            289 => 
            [
                'id_desa' => 290,
                'nama_desa' => 'Sumberpucung',
                'id_kecamatan' => 26,
            ],
            290 => 
            [
                'id_desa' => 291,
                'nama_desa' => 'Jatiguwi',
                'id_kecamatan' => 26,
            ],
            291 => 
            [
                'id_desa' => 292,
                'nama_desa' => 'Sambigede',
                'id_kecamatan' => 26,
            ],
            292 => 
            [
                'id_desa' => 293,
                'nama_desa' => 'Senggreng',
                'id_kecamatan' => 26,
            ],
            293 => 
            [
                'id_desa' => 294,
                'nama_desa' => 'Ternyang',
                'id_kecamatan' => 26,
            ],
            294 => 
            [
                'id_desa' => 295,
                'nama_desa' => 'Ngebruk',
                'id_kecamatan' => 26,
            ],
            295 => 
            [
                'id_desa' => 296,
                'nama_desa' => 'Karangkates',
                'id_kecamatan' => 26,
            ],
            296 => 
            [
                'id_desa' => 297,
                'nama_desa' => 'Tambakasri',
                'id_kecamatan' => 27,
            ],
            297 => 
            [
                'id_desa' => 298,
                'nama_desa' => 'Tangkilsari',
                'id_kecamatan' => 27,
            ],
            298 => 
            [
                'id_desa' => 299,
                'nama_desa' => 'Jambearjo',
                'id_kecamatan' => 27,
            ],
            299 => 
            [
                'id_desa' => 300,
                'nama_desa' => 'Jatisari',
                'id_kecamatan' => 27,
            ],
            300 => 
            [
                'id_desa' => 301,
                'nama_desa' => 'Pandanmulyo',
                'id_kecamatan' => 27,
            ],
            301 => 
            [
                'id_desa' => 302,
                'nama_desa' => 'Ngawonggo',
                'id_kecamatan' => 27,
            ],
            302 => 
            [
                'id_desa' => 303,
                'nama_desa' => 'Purwosekar',
                'id_kecamatan' => 27,
            ],
            303 => 
            [
                'id_desa' => 304,
                'nama_desa' => 'Gunungronggo',
                'id_kecamatan' => 27,
            ],
            304 => 
            [
                'id_desa' => 305,
                'nama_desa' => 'Gunungsari',
                'id_kecamatan' => 27,
            ],
            305 => 
            [
                'id_desa' => 306,
                'nama_desa' => 'Tajinan',
                'id_kecamatan' => 27,
            ],
            306 => 
            [
                'id_desa' => 307,
                'nama_desa' => 'Randugading',
                'id_kecamatan' => 27,
            ],
            307 => 
            [
                'id_desa' => 308,
                'nama_desa' => 'Sumbersuko',
                'id_kecamatan' => 27,
            ],
            308 => 
            [
                'id_desa' => 309,
                'nama_desa' => 'Purwodadi',
                'id_kecamatan' => 28,
            ],
            309 => 
            [
                'id_desa' => 310,
                'nama_desa' => 'Pujiharjo',
                'id_kecamatan' => 28,
            ],
            310 => 
            [
                'id_desa' => 311,
                'nama_desa' => 'Sumbertangkil',
                'id_kecamatan' => 28,
            ],
            311 => 
            [
                'id_desa' => 312,
                'nama_desa' => 'Kepatihan',
                'id_kecamatan' => 28,
            ],
            312 => 
            [
                'id_desa' => 313,
                'nama_desa' => 'Jogomulyan',
                'id_kecamatan' => 28,
            ],
            313 => 
            [
                'id_desa' => 314,
                'nama_desa' => 'Tirtoyudo',
                'id_kecamatan' => 28,
            ],
            314 => 
            [
                'id_desa' => 315,
                'nama_desa' => 'Gadungsari',
                'id_kecamatan' => 28,
            ],
            315 => 
            [
                'id_desa' => 316,
                'nama_desa' => 'Tlogosari',
                'id_kecamatan' => 28,
            ],
            316 => 
            [
                'id_desa' => 317,
                'nama_desa' => 'Sukorejo',
                'id_kecamatan' => 28,
            ],
            317 => 
            [
                'id_desa' => 318,
                'nama_desa' => 'Ampelgading',
                'id_kecamatan' => 28,
            ],
            318 => 
            [
                'id_desa' => 319,
                'nama_desa' => 'Tamankuncaran',
                'id_kecamatan' => 28,
            ],
            319 => 
            [
                'id_desa' => 320,
                'nama_desa' => 'Wonoagung',
                'id_kecamatan' => 28,
            ],
            320 => 
            [
                'id_desa' => 321,
                'nama_desa' => 'Tamansatrian',
                'id_kecamatan' => 28,
            ],
            321 => 
            [
                'id_desa' => 322,
                'nama_desa' => 'Ngingit',
                'id_kecamatan' => 29,
            ],
            322 => 
            [
                'id_desa' => 323,
                'nama_desa' => 'Kidal',
                'id_kecamatan' => 29,
            ],
            323 => 
            [
                'id_desa' => 324,
                'nama_desa' => 'Kambingan',
                'id_kecamatan' => 29,
            ],
            324 => 
            [
                'id_desa' => 325,
                'nama_desa' => 'Pandanajeng',
                'id_kecamatan' => 29,
            ],
            325 => 
            [
                'id_desa' => 326,
                'nama_desa' => 'Pulungdowo',
                'id_kecamatan' => 29,
            ],
            326 => 
            [
                'id_desa' => 327,
                'nama_desa' => 'Bokor',
                'id_kecamatan' => 29,
            ],
            327 => 
            [
                'id_desa' => 328,
                'nama_desa' => 'Slamet',
                'id_kecamatan' => 29,
            ],
            328 => 
            [
                'id_desa' => 329,
                'nama_desa' => 'Wringinsongo',
                'id_kecamatan' => 29,
            ],
            329 => 
            [
                'id_desa' => 330,
                'nama_desa' => 'Jeru',
                'id_kecamatan' => 29,
            ],
            330 => 
            [
                'id_desa' => 331,
                'nama_desa' => 'Malangsuko',
                'id_kecamatan' => 29,
            ],
            331 => 
            [
                'id_desa' => 332,
                'nama_desa' => 'Tumpang',
                'id_kecamatan' => 29,
            ],
            332 => 
            [
                'id_desa' => 333,
                'nama_desa' => 'Tulusbesar',
                'id_kecamatan' => 29,
            ],
            333 => 
            [
                'id_desa' => 334,
                'nama_desa' => 'Benjor',
                'id_kecamatan' => 29,
            ],
            334 => 
            [
                'id_desa' => 335,
                'nama_desa' => 'Duwet',
                'id_kecamatan' => 29,
            ],
            335 => 
            [
                'id_desa' => 336,
                'nama_desa' => 'Duwetkrajan',
                'id_kecamatan' => 29,
            ],
            336 => 
            [
                'id_desa' => 337,
                'nama_desa' => 'Turen',
                'id_kecamatan' => 30,
            ],
            337 => 
            [
                'id_desa' => 338,
                'nama_desa' => 'Sedayu',
                'id_kecamatan' => 30,
            ],
            338 => 
            [
                'id_desa' => 339,
                'nama_desa' => 'Kemulan',
                'id_kecamatan' => 30,
            ],
            339 => 
            [
                'id_desa' => 340,
                'nama_desa' => 'Tawangrejeni',
                'id_kecamatan' => 30,
            ],
            340 => 
            [
                'id_desa' => 341,
                'nama_desa' => 'Sawahan',
                'id_kecamatan' => 30,
            ],
            341 => 
            [
                'id_desa' => 342,
                'nama_desa' => 'Undaan',
                'id_kecamatan' => 30,
            ],
            342 => 
            [
                'id_desa' => 343,
                'nama_desa' => 'Gedog Kulon',
                'id_kecamatan' => 30,
            ],
            343 => 
            [
                'id_desa' => 344,
                'nama_desa' => 'Gedog Wetan',
                'id_kecamatan' => 30,
            ],
            344 => 
            [
                'id_desa' => 345,
                'nama_desa' => 'Talok',
                'id_kecamatan' => 30,
            ],
            345 => 
            [
                'id_desa' => 346,
                'nama_desa' => 'Tanggung',
                'id_kecamatan' => 30,
            ],
            346 => 
            [
                'id_desa' => 347,
                'nama_desa' => 'Jeru',
                'id_kecamatan' => 30,
            ],
            347 => 
            [
                'id_desa' => 348,
                'nama_desa' => 'Pagedangan',
                'id_kecamatan' => 30,
            ],
            348 => 
            [
                'id_desa' => 349,
                'nama_desa' => 'Sanankerto',
                'id_kecamatan' => 30,
            ],
            349 => 
            [
                'id_desa' => 350,
                'nama_desa' => 'Sananrejo',
                'id_kecamatan' => 30,
            ],
            350 => 
            [
                'id_desa' => 351,
                'nama_desa' => 'Kedok',
                'id_kecamatan' => 30,
            ],
            351 => 
            [
                'id_desa' => 352,
                'nama_desa' => 'Talangsuko',
                'id_kecamatan' => 30,
            ],
            352 => 
            [
                'id_desa' => 353,
                'nama_desa' => 'Tumpukrenteng',
                'id_kecamatan' => 30,
            ],
            353 => 
            [
                'id_desa' => 354,
                'nama_desa' => 'Sumbersuko',
                'id_kecamatan' => 31,
            ],
            354 => 
            [
                'id_desa' => 355,
                'nama_desa' => 'Mendalanwangi',
                'id_kecamatan' => 31,
            ],
            355 => 
            [
                'id_desa' => 356,
                'nama_desa' => 'Sitirejo',
                'id_kecamatan' => 31,
            ],
            356 => 
            [
                'id_desa' => 357,
                'nama_desa' => 'Parangargo',
                'id_kecamatan' => 31,
            ],
            357 => 
            [
                'id_desa' => 358,
                'nama_desa' => 'Gondowangi',
                'id_kecamatan' => 31,
            ],
            358 => 
            [
                'id_desa' => 359,
                'nama_desa' => 'Pandanrejo',
                'id_kecamatan' => 31,
            ],
            359 => 
            [
                'id_desa' => 360,
                'nama_desa' => 'Petungsewu',
                'id_kecamatan' => 31,
            ],
            360 => 
            [
                'id_desa' => 361,
                'nama_desa' => 'Sukodadi',
                'id_kecamatan' => 31,
            ],
            361 => 
            [
                'id_desa' => 362,
                'nama_desa' => 'Sidorahayu',
                'id_kecamatan' => 31,
            ],
            362 => 
            [
                'id_desa' => 363,
                'nama_desa' => 'Jedong',
                'id_kecamatan' => 31,
            ],
            363 => 
            [
                'id_desa' => 364,
                'nama_desa' => 'Dalisodo',
                'id_kecamatan' => 31,
            ],
            364 => 
            [
                'id_desa' => 365,
                'nama_desa' => 'Pandanlandung',
                'id_kecamatan' => 31,
            ],
            365 => 
            [
                'id_desa' => 366,
                'nama_desa' => 'Sumberputih',
                'id_kecamatan' => 32,
            ],
            366 => 
            [
                'id_desa' => 367,
                'nama_desa' => 'Wonoayu',
                'id_kecamatan' => 32,
            ],
            367 => 
            [
                'id_desa' => 368,
                'nama_desa' => 'Bambang',
                'id_kecamatan' => 32,
            ],
            368 => 
            [
                'id_desa' => 369,
                'nama_desa' => 'Bringin',
                'id_kecamatan' => 32,
            ],
            369 => 
            [
                'id_desa' => 370,
                'nama_desa' => 'Dadapan',
                'id_kecamatan' => 32,
            ],
            370 => 
            [
                'id_desa' => 371,
                'nama_desa' => 'Patokpicis',
                'id_kecamatan' => 32,
            ],
            371 => 
            [
                'id_desa' => 372,
                'nama_desa' => 'Blayu',
                'id_kecamatan' => 32,
            ],
            372 => 
            [
                'id_desa' => 373,
                'nama_desa' => 'Codo',
                'id_kecamatan' => 32,
            ],
            373 => 
            [
                'id_desa' => 374,
                'nama_desa' => 'Sukolilo',
                'id_kecamatan' => 32,
            ],
            374 => 
            [
                'id_desa' => 375,
                'nama_desa' => 'Kidangbang',
                'id_kecamatan' => 32,
            ],
            375 => 
            [
                'id_desa' => 376,
                'nama_desa' => 'Sukoanyar',
                'id_kecamatan' => 32,
            ],
            376 => 
            [
                'id_desa' => 377,
                'nama_desa' => 'Wajak',
                'id_kecamatan' => 32,
            ],
            377 => 
            [
                'id_desa' => 378,
                'nama_desa' => 'Ngembal',
                'id_kecamatan' => 32,
            ],
            378 => 
            [
                'id_desa' => 379,
                'nama_desa' => 'Bangelan',
                'id_kecamatan' => 33,
            ],
            379 => 
            [
                'id_desa' => 380,
                'nama_desa' => 'Kluwut',
                'id_kecamatan' => 33,
            ],
            380 => 
            [
                'id_desa' => 381,
                'nama_desa' => 'Plandi',
                'id_kecamatan' => 33,
            ],
            381 => 
            [
                'id_desa' => 382,
                'nama_desa' => 'Plaosan',
                'id_kecamatan' => 33,
            ],
            382 => 
            [
                'id_desa' => 383,
                'nama_desa' => 'Kebobang',
                'id_kecamatan' => 33,
            ],
            383 => 
            [
                'id_desa' => 384,
                'nama_desa' => 'Wonosari',
                'id_kecamatan' => 33,
            ],
            384 => 
            [
                'id_desa' => 385,
                'nama_desa' => 'Sumbertempur',
                'id_kecamatan' => 33,
            ],
            385 => 
            [
                'id_desa' => 386,
                'nama_desa' => 'Sumberdem',
                'id_kecamatan' => 33,
            ],
            386 => 
            [
                'id_desa' => 387,
                'nama_desa' => 'Purwodadi',
                'id_kecamatan' => 6,
            ],
            387 => 
            [
                'id_desa' => 388,
                'nama_desa' => 'Girimulyo',
                'id_kecamatan' => 7,
            ],
            388 => 
            [
                'id_desa' => 389,
                'nama_desa' => 'Mentaraman',
                'id_kecamatan' => 6,
            ],
        ]);
    }
}