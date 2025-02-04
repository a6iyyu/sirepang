<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desa extends Model {
    protected $table = 'desa';
    protected $primaryKey = 'desa_id';

    public function kecamatan(): BelongsTo {
        return $this->belongsTo('App\Models\Kecamatan', 'desa_kec_id', 'kec_id');
    }

    public function koleksiKeluarga(): HasMany {
        return $this->hasMany('App\Models\Keluarga', 'keluarga_desa_id', 'desa_id');
    }
}
