<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model {
    protected $table = 'kecamatan';
    protected $primaryKey = 'kec_id';

    public function desa(): HasMany {
        return $this->hasMany('App\Models\Desa', 'desa_kec_id', 'kec_id');
    }

    public function keluarga(): HasMany {
        return $this->hasMany('App\Models\Keluarga', 'keluarga_kec_id', 'kec_id');
    }
}
