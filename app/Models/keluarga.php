<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keluarga extends Model {
    protected $table = 'keluarga';
    protected $primaryKey = 'keluarga_id';
    public function desa(): BelongsTo{
        return $this->belongsTo('App\Models\Desa', 'keluarga_desa_id', 'desa_id');
    }

    public function kecamatan(): BelongsTo{
        return $this->belongsTo('App\Models\Kecamatan', 'keluarga_kec_id', 'kec_id');
    }

    public function kader(): BelongsTo{
        return $this->belongsTo('App\Models\Kader', 'keluarga_kader_id', 'kader_id');
    }
}
