<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pangan extends Model
{
    protected $table = 'pangan';
    protected $primaryKey = 'id_pangan';
}