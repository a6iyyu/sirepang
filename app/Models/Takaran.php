<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Takaran extends Model
{
    use HasFactory;

    protected $table = 'takaran';
    protected $primaryKey = 'id_takaran';

    public function pangan(): HasMany
    {
        return $this->hasMany(Pangan::class, 'id_takaran');
    }
}