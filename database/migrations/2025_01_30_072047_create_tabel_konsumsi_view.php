<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("CREATE VIEW `tabel_konsumsi` AS select `kec`.`kec_id` AS `kec_id`,`d`.`desa_id` AS `desa_id`,`p`.`pangan_id` AS `pangan_id`,`p`.`pangan_nama` AS `pangan_nama`,`k`.`keluarga_id` AS `keluarga_id`,`k`.`jumlah_anggota_keluarga` AS `jumlah_anggota_keluarga`,`jp`.`jenis_pangan_id` AS `jenis_pangan_id`,`jp`.`jenis_pangan_nama` AS `jenis_pangan_nama`,`dpk`.`detail_pangan_keluarga_urt` AS `detail_pangan_keluarga_urt`,(`dpk`.`detail_pangan_keluarga_urt` / `k`.`jumlah_anggota_keluarga`) AS `berat_pangan_perkapita` from (((((`sirepang`.`detail_pangan_keluarga` `dpk` join `sirepang`.`pangan` `p` on((`dpk`.`detail_pangan_keluarga_pangan_id` = `p`.`pangan_id`))) join `sirepang`.`jenis_pangan` `jp` on((`jp`.`jenis_pangan_id` = `p`.`pangan_jenis_pangan_id`))) join `sirepang`.`keluarga` `k` on((`dpk`.`detail_pangan_keluarga_keluarga_id` = `k`.`keluarga_id`))) join `sirepang`.`desa` `d` on((`d`.`desa_id` = `k`.`keluarga_desa_id`))) join `sirepang`.`kecamatan` `kec` on((`kec`.`kec_id` = `d`.`desa_kec_id`))) order by `k`.`keluarga_id`");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `tabel_konsumsi`");
    }
};