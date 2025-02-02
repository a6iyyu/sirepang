<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pangan extends Model {
    protected $table = 'pangan';
    protected $primaryKey = 'pangan_id';
    public function jenisPangan(): BelongsTo{
        return $this->belongsTo('App\Models\JenisPangan', 'pangan_jenis_id', 'jenis_id');
    }
}
