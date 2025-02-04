<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model {
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    public function login(): BelongsTo {
        return $this->belongsTo(Login::class, 'admin_login_id');
    }
}
