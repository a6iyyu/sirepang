<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pangan extends Seeder
{

    /**
     * @return void
     */
    public function run()
    {
        DB::table('pangan')->delete();

        DB::table('pangan')->insert(
            [
0 =>
                    [
                        'id_pangan' => 1,
                        'nama_pangan' => 'Daun Jeruk Purut',
                        'takaran' => 'helai daun',
                        'urt' => 1,
                        'gram' => '2.00',
                        'kalori' => '2.40',
                        'lemak' => '0.01',
                        'karbohidrat' => '0.29',
                        'protein' => '0.06',
                        'id_jenis_pangan' => 9,
                    ],
            ],
        );
    }
}
