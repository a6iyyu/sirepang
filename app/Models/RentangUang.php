<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentangUang extends Model
{
    use HasFactory;

    protected $table = 'rentang_uang';
    protected $primaryKey = 'id_rentang_uang';
}