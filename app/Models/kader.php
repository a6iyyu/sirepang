<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kader extends Model {
    protected $table = 'kader';
    protected $primaryKey = 'idkader';
    public $timestamps = false;

    public function kecamatan(): BelongsTo {
        return $this->belongsTo('App\Models\Kecamatan', 'idkecamatan', 'idkecamatan');
    }
    
}
