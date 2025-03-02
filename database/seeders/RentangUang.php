<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentangUang extends Seeder
{
    public function run(): void
    {
        DB::table('rentang_uang')->delete();
        DB::table('rentang_uang')->insert([
            0 =>
                [
                    'id_rentang_uang' => 1,
                    'batas_bawah' => 'Rp0',
                    'batas_atas' => 'Rp650.000,00',
                ],
            1 =>
                [
                    'id_rentang_uang' => 2,
                    'batas_bawah' => 'Rp650.001,00',
                    'batas_atas' => 'Rp1.200.000,00',
                ],
            2 =>
                [
                    'id_rentang_uang' => 3,
                    'batas_bawah' => 'Rp1.200.001,00',
                    'batas_atas' => 'Rp5.000.000,00',
                ],
            3 =>
                [
                    'id_rentang_uang' => 4,
                    'batas_bawah' => 'Rp5.000.001,00',
                    'batas_atas' => 'Rp20.000.000,00',
                ],
        ]);
    }
}