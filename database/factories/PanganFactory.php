<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\JenisPangan;
use App\Models\Pangan;
use App\Models\Takaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pangan>
 */
class PanganFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_pangan'            => $this->faker->randomNumber(9, true),
            'nama_pangan'          => Pangan::factory(),
            'gram'                 => 1000,
            'kalori'               => 1000,
            'lemak'                => 1000,
            'karbohidrat'          => 1000,
            'protein'              => 1000,
            'id_jenis_pangan'      => JenisPangan::factory(),
            'id_takaran'           => Takaran::factory(),
            'referensi_urt'        => $this->faker->randomNumber(9, true),
            'referensi_gram_berat' => $this->faker->randomNumber(9, true),
        ];
    }
}