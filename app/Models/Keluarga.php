<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    protected $guarded = ['id_keluarga'];
    public $timestamps = false;

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }

    public function detail_pangan_keluarga(): HasMany
    {
        return $this->hasMany(DetailPanganKeluarga::class, 'id_keluarga', 'id_keluarga');
    }

    public function kader(): BelongsTo
    {
        return $this->belongsTo(Kader::class, 'id_kader', 'id_kader');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function pangan_keluarga(): HasMany
    {
        return $this->hasMany(PanganKeluarga::class, 'id_keluarga', 'id_keluarga');
    }

    public function rentang_pendapatan(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'rentang_pendapatan', 'id_rentang_uang');
    }

    public function rentang_pengeluaran(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'rentang_pengeluaran', 'id_rentang_uang');
    }
}