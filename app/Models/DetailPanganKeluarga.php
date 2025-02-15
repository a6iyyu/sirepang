<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPanganKeluarga extends Model
{
    protected $table = 'detail_pangan_keluarga';
    protected $primaryKey = 'iddetail_pangan_keluarga';
    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'idkeluarga');
    }
    public function pangan(): BelongsTo
    {
        return $this->belongsTo(Pangan::class, 'idpangan');
    }
}
