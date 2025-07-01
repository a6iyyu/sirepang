<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PanganKeluarga extends Model
{
    use HasFactory;

    protected $table = 'pangan_keluarga';
    protected $primaryKey = 'id_pangan_keluarga';
    public $timestamps = false;
    protected $fillable = ['id_pangan', 'id_keluarga', 'urt'];

    public function pangan(): BelongsTo
    {
        return $this->belongsTo(Pangan::class, 'id_pangan', 'id_pangan');
    }

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga', 'id_keluarga');
    }
}