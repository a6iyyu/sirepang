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
            1 => [ 'id_kecamatan' => 1, 'kode_wilayah' => '35.07.06', 'nama_kecamatan' => 'Ampelgading' ],
            2 => [ 'id_kecamatan' => 2, 'kode_wilayah' => '35.07.03', 'nama_kecamatan' => 'Bantur' ],
            3 => [ 'id_kecamatan' => 3, 'kode_wilayah' => '35.73.01', 'nama_kecamatan' => 'Blimbing' ],
            4 => [ 'id_kecamatan' => 4, 'kode_wilayah' => '35.07.14', 'nama_kecamatan' => 'Bululawang' ],
            5 => [ 'id_kecamatan' => 5, 'kode_wilayah' => '35.07.05', 'nama_kecamatan' => 'Dampit' ],
            6 => [ 'id_kecamatan' => 6, 'kode_wilayah' => '35.07.22', 'nama_kecamatan' => 'Dau' ],
            7 => [ 'id_kecamatan' => 7, 'kode_wilayah' => '35.07.01', 'nama_kecamatan' => 'Donomulyo' ],
            8 => [ 'id_kecamatan' => 8, 'kode_wilayah' => '35.07.29', 'nama_kecamatan' => 'Gedangan' ],
            9 => [ 'id_kecamatan' => 9, 'kode_wilayah' => '35.07.10', 'nama_kecamatan' => 'Gondanglegi' ],
            10 => [ 'id_kecamatan' => 10, 'kode_wilayah' => '35.07.17', 'nama_kecamatan' => 'Jabung' ],
            11 => [ 'id_kecamatan' => 11, 'kode_wilayah' => '35.07.11', 'nama_kecamatan' => 'Kalipare' ],
            12 => [ 'id_kecamatan' => 12, 'kode_wilayah' => '35.07.23', 'nama_kecamatan' => 'Karang Ploso' ],
            13 => [ 'id_kecamatan' => 13, 'kode_wilayah' => '35.07.28', 'nama_kecamatan' => 'Kasembon' ],
            14 => [ 'id_kecamatan' => 14, 'kode_wilayah' => '35.73.03', 'nama_kecamatan' => 'Kedungkandang' ],
            15 => [ 'id_kecamatan' => 15, 'kode_wilayah' => '35.07.13', 'nama_kecamatan' => 'Kepanjen' ],
            16 => [ 'id_kecamatan' => 16, 'kode_wilayah' => '35.73.02', 'nama_kecamatan' => 'Klojen' ],
            17 => [ 'id_kecamatan' => 17, 'kode_wilayah' => '35.07.31', 'nama_kecamatan' => 'Kromengan' ],
            18 => [ 'id_kecamatan' => 18, 'kode_wilayah' => '35.07.25', 'nama_kecamatan' => 'Lawang' ],
            19 => [ 'id_kecamatan' => 19, 'kode_wilayah' => '35.73.05', 'nama_kecamatan' => 'Lowokwaru' ],
            20 => [ 'id_kecamatan' => 20, 'kode_wilayah' => '35.07.20', 'nama_kecamatan' => 'Ngajum' ],
            21 => [ 'id_kecamatan' => 21, 'kode_wilayah' => '35.07.27', 'nama_kecamatan' => 'Ngantang' ],
            22 => [ 'id_kecamatan' => 22, 'kode_wilayah' => '35.07.02', 'nama_kecamatan' => 'Pagak' ],
            23 => [ 'id_kecamatan' => 23, 'kode_wilayah' => '35.07.33', 'nama_kecamatan' => 'Pagelaran' ],
            24 => [ 'id_kecamatan' => 24, 'kode_wilayah' => '35.07.18', 'nama_kecamatan' => 'Pakis' ],
            25 => [ 'id_kecamatan' => 25, 'kode_wilayah' => '35.07.19', 'nama_kecamatan' => 'Pakisaji' ],
            26 => [ 'id_kecamatan' => 26, 'kode_wilayah' => '35.07.07', 'nama_kecamatan' => 'Poncokusumo' ],
            27 => [ 'id_kecamatan' => 27, 'kode_wilayah' => '35.07.26', 'nama_kecamatan' => 'Pujon' ],
            28 => [ 'id_kecamatan' => 28, 'kode_wilayah' => '35.07.24', 'nama_kecamatan' => 'Singosari' ],
            29 => [ 'id_kecamatan' => 29, 'kode_wilayah' => '35.73.04', 'nama_kecamatan' => 'Sukun' ],
            30 => [ 'id_kecamatan' => 30, 'kode_wilayah' => '35.07.04', 'nama_kecamatan' => 'Sumbermanjing Wetan' ],
            31 => [ 'id_kecamatan' => 31, 'kode_wilayah' => '35.07.12', 'nama_kecamatan' => 'Sumberpucung' ],
            32 => [ 'id_kecamatan' => 32, 'kode_wilayah' => '35.07.15', 'nama_kecamatan' => 'Tajinan' ],
            33 => [ 'id_kecamatan' => 33, 'kode_wilayah' => '35.07.30', 'nama_kecamatan' => 'Tirtoyudo' ],
            34 => [ 'id_kecamatan' => 34, 'kode_wilayah' => '35.07.16', 'nama_kecamatan' => 'Tumpang' ],
            35 => [ 'id_kecamatan' => 35, 'kode_wilayah' => '35.07.09', 'nama_kecamatan' => 'Turen' ],
            36 => [ 'id_kecamatan' => 36, 'kode_wilayah' => '35.07.21', 'nama_kecamatan' => 'Wagir' ],
            37 => [ 'id_kecamatan' => 37, 'kode_wilayah' => '35.07.08', 'nama_kecamatan' => 'Wajak' ],
            38 => [ 'id_kecamatan' => 38, 'kode_wilayah' => '35.07.32', 'nama_kecamatan' => 'Wonosari' ],
        ]);
    }
}
