<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPanganKeluarga extends Model
{
    use HasFactory;

    protected $table = 'detail_pangan_keluarga';
    protected $primaryKey = 'id_detail_pangan_keluarga';
}