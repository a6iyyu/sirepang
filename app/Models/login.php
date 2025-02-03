<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    protected $fillable = ['login_username', 'login_password'];

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
