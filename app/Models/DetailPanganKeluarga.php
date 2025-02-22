<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPanganKeluarga extends Model
{
    protected $table = 'detail_pangan_keluarga';
    protected $primaryKey = 'id_detail_pangan_keluarga';
    protected $guarded = ['id_detail_pangan_keluarga'];
    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga', 'id_keluarga');
    }
    public function pangan(): BelongsTo
    {
        return $this->belongsTo(Pangan::class, 'id_pangan', 'id_pangan');
    }
}
