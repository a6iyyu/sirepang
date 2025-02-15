<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desa extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'iddesa';
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'idkecamatan');
    }
}
