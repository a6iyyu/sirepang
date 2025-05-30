<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pangan extends Model
{
    use HasFactory;

    protected $table = 'pangan';
    protected $primaryKey = 'id_pangan';
    public $timestamps = false;

    public function takaran(): BelongsTo
    {
        return $this->belongsTo(Takaran::class, 'id_takaran', 'id_takaran');
    }

    public function jenis_pangan(): BelongsTo
    {
        return $this->belongsTo(JenisPangan::class, 'id_jenis_pangan', 'id_jenis_pangan');
    }
}