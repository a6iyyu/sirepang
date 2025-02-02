<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PanganKeluarga extends Model {
    protected $table = 'pangan_keluarga';
    protected $primaryKey = 'pangan_keluarga_id';

    public function keluarga(): BelongsTo{
        return $this->belongsTo(Keluarga::class, 'pangan_keluarga_keluarga_id');
    }
}
