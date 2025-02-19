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
                    'batas_atas' => 'Rp500.000,00',
                ],
            1 =>
                [
                    'id_rentang_uang' => 2,
                    'batas_bawah' => 'Rp500.001,00',
                    'batas_atas' => 'Rp1.000.000,00',
                ],
            2 =>
                [
                    'id_rentang_uang' => 3,
                    'batas_bawah' => 'Rp1.000.001,00',
                    'batas_atas' => 'Rp2.000.000,00',
                ],
            3 =>
                [
                    'id_rentang_uang' => 4,
                    'batas_bawah' => 'Rp2.000.001,00',
                    'batas_atas' => 'Rp3.000.000,00',
                ],
        ]);
    }
}