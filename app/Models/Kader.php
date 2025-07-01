<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id_kader
 * @property int $id_kecamatan
 * @property string $nama
 * @property string $nip
 * @property string $contact_info
 * @property-read Kecamatan $kecamatan
 */
class Kader extends Model
{
    use HasFactory;

    protected $table = 'kader';
    protected $primaryKey = 'id_kader';
    public $timestamps = false;

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}