<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pangan extends Model
{
    protected $table = 'pangan';
    protected $primaryKey = 'id_pangan';

    public function takaran(): BelongsTo
    {
        return $this->belongsTo(Takaran::class, 'id_takaran', 'id_takaran');
    }
}