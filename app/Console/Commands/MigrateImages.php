<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Keluarga;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MigrateImages extends Command
{
    protected $signature = 'migrate:images';
    protected $description = 'Migrate base64 images to file storage';

    public function handle()
    {
        $this->info('Mulai migrasi gambar...');

        Keluarga::whereNotNull('gambar')->chunk(100, function ($items) {
            foreach ($items as $item) {
                $base64 = $item->gambar;
                if (str_contains($base64, 'base64,')) [, $base64] = explode('base64,', $base64, 2);
                $decoded = base64_decode($base64);

                if ($decoded === false || strlen($decoded) < 100) {
                    $this->error("Gagal decode base64 untuk ID {$item->id_keluarga} atau data terlalu kecil.");
                    continue;
                }

                $name = "image_{$item->id_keluarga}.jpg";
                Storage::disk('public')->put("images/$name", $decoded);
                $this->info("Ukuran data untuk ID {$item->id_keluarga}: " . strlen($decoded));
                $item->gambar = "storage/images/$name";
                $item->save();
                $this->info("Migrasi gambar untuk ID {$item->id_keluarga} selesai.");
            }
        });

        $this->info('Semua gambar berhasil dimigrasi!');
    }
}