<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keluarga extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'idkeluarga';
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'idkecamatan');
    }
}
