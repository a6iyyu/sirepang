<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPangan extends Model
{
    protected $table = 'jenis_pangan';
    protected $primaryKey = 'id_jenis_pangan';

    public function daftar_pangan(): HasMany
    {
        return $this->hasMany(Pangan::class, 'id_jenis_pangan');
    }
}