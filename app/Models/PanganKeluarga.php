<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PanganKeluarga extends Model
{
    protected $table = 'pangan_keluarga';
    protected $primaryKey = 'id_pangan_keluarga';
    public $timestamps = false;

    protected $fillable = [
        'id_pangan',
        'id_keluarga',
        'urt'
    ];

    public function pangan()
    {
        return $this->belongsTo(Pangan::class, 'id_pangan', 'id_pangan');
    }

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class,'id_keluarga','id_keluarga');
    }
}