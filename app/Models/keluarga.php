<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    protected $guarded = ['id_keluarga'];

    public function rentangPendapatan(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'id_rentang_uang', 'id_rentang_pendapatan');
    }

    public function rentangPengeluaran(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'id_rentang_uang', 'id_rentang_pengeluaran');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
    public function kader(): BelongsTo
    {
        return $this->belongsTo(Kader::class, 'id_kader', 'id_kader');
    }
    public function detailPanganKeluarga(): HasMany
    {
        return $this->hasMany(DetailPanganKeluarga::class, 'id_keluarga', 'id_keluarga');
    }
}
