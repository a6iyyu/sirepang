<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPanganKeluarga extends Model
{
    protected $table = 'detail_pangan_keluarga';
    protected $primaryKey = 'id_detail_pangan_keluarga';
}