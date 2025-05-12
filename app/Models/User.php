<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username', 'password', 'tipe'];
    public $timestamps = false;

    public function desa(): HasMany
    {
        return $this->hasMany(Desa::class, 'id_desa', 'id_desa');
    }

    public function kader(): BelongsTo
    {
        return $this->belongsTo(Kader::class, 'id_kader', 'id_kader');
    }

    public function kecamatan(): HasMany
    {
        return $this->hasMany(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function keluarga(): HasMany
    {
        return $this->hasMany(Keluarga::class, 'id_kader', 'id_kader');
    }
}