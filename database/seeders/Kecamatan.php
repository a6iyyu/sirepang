<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kecamatan extends Seeder
{
    public function run()
    {
        DB::table('kecamatan')->delete();
        DB::table('kecamatan')->insert([
            1 => ['id_kecamatan' => 1, 'kode_wilayah' => '35.07.06', 'nama_kecamatan' => 'Ampelgading'],
            2 => ['id_kecamatan' => 2, 'kode_wilayah' => '35.07.03', 'nama_kecamatan' => 'Bantur'],
            3 => ['id_kecamatan' => 3, 'kode_wilayah' => '35.07.14', 'nama_kecamatan' => 'Bululawang'],
            4 => ['id_kecamatan' => 4, 'kode_wilayah' => '35.07.05', 'nama_kecamatan' => 'Dampit'],
            5 => ['id_kecamatan' => 5, 'kode_wilayah' => '35.07.22', 'nama_kecamatan' => 'Dau'],
            6 => ['id_kecamatan' => 6, 'kode_wilayah' => '35.07.01', 'nama_kecamatan' => 'Donomulyo'],
            7 => ['id_kecamatan' => 7, 'kode_wilayah' => '35.07.29', 'nama_kecamatan' => 'Gedangan'],
            8 => ['id_kecamatan' => 8, 'kode_wilayah' => '35.07.10', 'nama_kecamatan' => 'Gondanglegi'],
            9 => ['id_kecamatan' => 9, 'kode_wilayah' => '35.07.17', 'nama_kecamatan' => 'Jabung'],
            10 => ['id_kecamatan' => 10, 'kode_wilayah' => '35.07.11', 'nama_kecamatan' => 'Kalipare'],
            11 => ['id_kecamatan' => 11, 'kode_wilayah' => '35.07.23', 'nama_kecamatan' => 'Karang Ploso'],
            12 => ['id_kecamatan' => 12, 'kode_wilayah' => '35.07.28', 'nama_kecamatan' => 'Kasembon'],
            13 => ['id_kecamatan' => 13, 'kode_wilayah' => '35.07.13', 'nama_kecamatan' => 'Kepanjen'],
            14 => ['id_kecamatan' => 14, 'kode_wilayah' => '35.07.31', 'nama_kecamatan' => 'Kromengan'],
            15 => ['id_kecamatan' => 15, 'kode_wilayah' => '35.07.25', 'nama_kecamatan' => 'Lawang'],
            16 => ['id_kecamatan' => 16, 'kode_wilayah' => '35.07.20', 'nama_kecamatan' => 'Ngajum'],
            17 => ['id_kecamatan' => 17, 'kode_wilayah' => '35.07.27', 'nama_kecamatan' => 'Ngantang'],
            18 => ['id_kecamatan' => 18, 'kode_wilayah' => '35.07.02', 'nama_kecamatan' => 'Pagak'],
            19 => ['id_kecamatan' => 19, 'kode_wilayah' => '35.07.33', 'nama_kecamatan' => 'Pagelaran'],
            20 => ['id_kecamatan' => 20, 'kode_wilayah' => '35.07.18', 'nama_kecamatan' => 'Pakis'],
            21 => ['id_kecamatan' => 21, 'kode_wilayah' => '35.07.19', 'nama_kecamatan' => 'Pakisaji'],
            22 => ['id_kecamatan' => 22, 'kode_wilayah' => '35.07.07', 'nama_kecamatan' => 'Poncokusumo'],
            23 => ['id_kecamatan' => 23, 'kode_wilayah' => '35.07.26', 'nama_kecamatan' => 'Pujon'],
            24 => ['id_kecamatan' => 24, 'kode_wilayah' => '35.07.24', 'nama_kecamatan' => 'Singosari'],
            25 => ['id_kecamatan' => 25, 'kode_wilayah' => '35.07.04', 'nama_kecamatan' => 'Sumbermanjing Wetan'],
            26 => ['id_kecamatan' => 26, 'kode_wilayah' => '35.07.12', 'nama_kecamatan' => 'Sumberpucung'],
            27 => ['id_kecamatan' => 27, 'kode_wilayah' => '35.07.15', 'nama_kecamatan' => 'Tajinan'],
            28 => ['id_kecamatan' => 28, 'kode_wilayah' => '35.07.30', 'nama_kecamatan' => 'Tirtoyudo'],
            29 => ['id_kecamatan' => 29, 'kode_wilayah' => '35.07.16', 'nama_kecamatan' => 'Tumpang'],
            30 => ['id_kecamatan' => 30, 'kode_wilayah' => '35.07.09', 'nama_kecamatan' => 'Turen'],
            31 => ['id_kecamatan' => 31, 'kode_wilayah' => '35.07.21', 'nama_kecamatan' => 'Wagir'],
            32 => ['id_kecamatan' => 32, 'kode_wilayah' => '35.07.08', 'nama_kecamatan' => 'Wajak'],
            33 => ['id_kecamatan' => 33, 'kode_wilayah' => '35.07.32', 'nama_kecamatan' => 'Wonosari'],
            34 => ['id_kecamatan' => 34, 'kode_wilayah' => '35.00.00', 'nama_kecamatan' => 'Sukasuka'],
        ]);
    }
}