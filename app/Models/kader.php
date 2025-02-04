<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kader extends Model {
    protected $table = 'kader';
    protected $primaryKey = 'kader_id';

    public function kecamatan(): BelongsTo {
        return $this->belongsTo('App\Models\Kecamatan', 'kader_kec_id', 'kec_id');
    }

    public function login(): BelongsTo {
        return $this->belongsTo(Login::class, 'kader_login_id');
    }
}
