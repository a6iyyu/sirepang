<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User;

class Login extends Authenticatable
{
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    protected $fillable = ['login_username', 'login_password'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'login_user_id');
    }

    public function kader(): BelongsTo
    {
        return $this->belongsTo(Kader::class, 'login_user_id');
    }

    public function akun(): BelongsTo
    {
        return $this->login_tipe === 'Admin'
            ? $this->admin()
            : $this->kader();
    }


    public function getAuthPassword()
    {
        return $this->login_password;
    }

    //dis
    public $timestamps = false;

    public function getRememberTokenName()
    {
        return null; // disable remember token
    }
    //able
}
