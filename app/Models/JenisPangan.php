<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPangan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pangan';
    protected $primaryKey = 'id_jenis_pangan';
    public $timestamps = false;

    public function daftar_pangan(): HasMany
    {
        return $this->hasMany(Pangan::class, 'id_jenis_pangan');
    }
}