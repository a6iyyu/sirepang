<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pangan extends Model
{
    protected $tables = 'pangan';
    protected $primaryKey = 'idpangan';
    protected function jenisPangan(): BelongsTo
    {
        return $this->belongsTo(JenisPangan::class, 'idjenis_pangan');
    }
}
