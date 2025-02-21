<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';

    public function rentangPendapatan(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'id_rentang_uang', 'id_rentang_pendapatan');
    }

    public function rentangPengeluaran(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'id_rentang_uang', 'id_rentang_pengeluaran');

    }
}