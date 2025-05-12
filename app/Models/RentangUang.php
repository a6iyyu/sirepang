<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentangUang extends Model
{
    use HasFactory;

    protected $table = 'rentang_uang';
    protected $primaryKey = 'id_rentang_uang';
    public $timestamps = false;
}