<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class AnggotaKeluarga extends Model {
    protected $table = 'anggota_keluarga';
    protected $primaryKey = 'anggota_keluarga_id';

    public function keluarga(): Relations\BelongsTo {
        return $this->belongsTo(Keluarga::class, 'anggota_keluarga_keluarga_id');
    }
}
