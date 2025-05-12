<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Desa;
use App\Models\Kader;
use App\Models\Kecamatan;
use App\Models\Keluarga;
use App\Models\Pangan;
use App\Models\RentangUang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class KeluargaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function data_keluarga_dapat_disimpan(): void
    {
        Storage::fake('public');

        $kecamatan = Kecamatan::factory()->create([
            'id_kecamatan'   => 1,
            'nama_kecamatan' => 'Pakis'
        ]);

        $desa = Desa::factory()->create([
            'id_desa'      => 1,
            'nama_desa'    => 'Saptorenggo',
            'id_kecamatan' => $kecamatan->id_kecamatan,
        ]);

        $kader = Kader::factory()->create([
            'id_kader'      => 19,
            'id_kecamatan'  => $kecamatan->id_kecamatan,
            'nama'          => 'Budi',
            'nip'           => '123456789123456789',
            'contact_info'  => '081234567890',
        ]);

        $rentang_uang = RentangUang::factory()->create([
            'id_rentang_uang' => 1,
            'batas_bawah'     => 1,
            'batas_atas'      => 2,
        ]);

        $pangan = Pangan::factory()->create([
            'id_pangan' => 4,
            'nama_pangan' => 'Beras'
        ]);

        $gambar = UploadedFile::fake()->image('keluarga.jpg')->store('gambar-keluarga', 'public');

        $keluarga = new Keluarga();
        $keluarga->nama_kepala_keluarga = 'Budi';
        $keluarga->id_keluarga = 1;
        $keluarga->id_kader = $kader->id_kader;
        $keluarga->alamat = 'Jl. Raya';
        $keluarga->jumlah_keluarga = 10;
        $keluarga->rentang_pendapatan = $rentang_uang->id_rentang_uang;
        $keluarga->rentang_pengeluaran = $rentang_uang->id_rentang_uang;
        $keluarga->is_hamil = 'Ya';
        $keluarga->is_menyusui = 'Tidak';
        $keluarga->is_balita = 'Tidak';
        $keluarga->id_desa = $desa->id_desa;
        $keluarga->id_kecamatan = $kecamatan->id_kecamatan;
        $keluarga->gambar = $gambar;
        $keluarga->save();

        $keluarga->pangan_keluarga()->createMany([
            ['id_keluarga' => $keluarga->id_keluarga, 'id_pangan' => $pangan->id_pangan, 'urt' => 3],
        ]);

        $this->assertDatabaseHas('keluarga', [
            'nama_kepala_keluarga' => 'Budi',
            'gambar'               => $gambar,
        ]);

        $this->assertDatabaseHas('pangan_keluarga', [
            'id_pangan'   => 4,
            'urt'         => 3,
            'id_keluarga' => 1,
        ]);
    }
}