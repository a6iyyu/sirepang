<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kader extends Model
{
    protected $table = 'kader';
    protected $primaryKey = 'id_kader';
    public $timestamps = false;
}