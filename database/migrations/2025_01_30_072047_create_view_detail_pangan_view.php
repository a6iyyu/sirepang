<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("CREATE VIEW `view_detail_pangan` AS select `dpk`.`detail_pangan_keluarga_id` AS `detail_pangan_keluarga_id`,`kak`.`keluarga_no_kk` AS `keluarga_no_kk`,`kak`.`kec_nama` AS `kec_nama`,`kak`.`desa_nama` AS `desa_nama`,`kak`.`anggota_keluarga_nama` AS `anggota_keluarga_nama`,`p`.`pangan_nama` AS `pangan_nama`,`dpk`.`detail_pangan_keluarga_urt` AS `detail_pangan_keluarga_urt`,`dpk`.`detail_pangan_keluarga_asal` AS `detail_pangan_keluarga_asal` from ((`sirepang`.`detail_pangan_keluarga` `dpk` join (select `k`.`keluarga_id` AS `keluarga_id`,`k`.`keluarga_no_kk` AS `keluarga_no_kk`,`ak`.`anggota_keluarga_nama` AS `anggota_keluarga_nama`,`kec`.`kec_nama` AS `kec_nama`,`d`.`desa_nama` AS `desa_nama` from (((`sirepang`.`keluarga` `k` join `sirepang`.`anggota_keluarga` `ak` on((`k`.`keluarga_id` = `ak`.`anggota_keluarga_keluarga_id`))) join `sirepang`.`kecamatan` `kec` on((`k`.`keluarga_kec_id` = `kec`.`kec_id`))) join `sirepang`.`desa` `d` on((`k`.`keluarga_kec_id` = `d`.`desa_id`)))) `kak` on((`dpk`.`detail_pangan_keluarga_keluarga_id` = `kak`.`keluarga_id`))) join `sirepang`.`pangan` `p` on((`dpk`.`detail_pangan_keluarga_pangan_id` = `p`.`pangan_id`))) order by `dpk`.`detail_pangan_keluarga_tanggal`");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `view_detail_pangan`");
    }
};