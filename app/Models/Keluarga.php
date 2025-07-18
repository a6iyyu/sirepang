<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id_keluarga
 * @property string $nama_kepala_keluarga
 * @property string $alamat
 * @property int $id_desa
 * @property int $id_kecamatan
 * @property int $id_kader
 * @property int $jumlah_keluarga
 * @property int $rentang_pendapatan
 * @property int $rentang_pengeluaran
 * @property bool $is_hamil
 * @property bool $is_menyusui
 * @property bool $is_balita
 * @property string|null $gambar
 * @property Status $status
 * @property string|null $komentar
 *
 * @property-read Desa $desa
 * @property-read Kecamatan $kecamatan
 * @property-read Kader|null $kader
 * @property-read RentangUang $rentang_pendapatan_model
 * @property-read RentangUang $rentang_pengeluaran_model
 * @property-read Collection|PanganKeluarga[] $pangan_keluarga
 * @property-read Collection|DetailPanganKeluarga[] $detail_pangan_keluarga
 */
class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    protected $guarded = ['id_keluarga'];
    protected $casts = ['status' => Status::class];
    public $timestamps = false;

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }

    public function detail_pangan_keluarga(): HasMany
    {
        return $this->hasMany(DetailPanganKeluarga::class, 'id_keluarga', 'id_keluarga');
    }

    public function kader(): BelongsTo
    {
        return $this->belongsTo(Kader::class, 'id_kader', 'id_kader');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function pangan_keluarga(): HasMany
    {
        return $this->hasMany(PanganKeluarga::class, 'id_keluarga', 'id_keluarga');
    }

    public function rentang_pendapatan(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'rentang_pendapatan', 'id_rentang_uang');
    }

    public function rentang_pengeluaran(): BelongsTo
    {
        return $this->belongsTo(RentangUang::class, 'rentang_pengeluaran', 'id_rentang_uang');
    }
}