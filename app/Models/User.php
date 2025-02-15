<?php

namespace App\Models;

use Illuminate\Container\Attributes\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'idkader';
    public function kader(): BelongsTo
    {
            return $this->belongsTo('App\Models\Kader', 'idkader', 'idkader');
    }
}
