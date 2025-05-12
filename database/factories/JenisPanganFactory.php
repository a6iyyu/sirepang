<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\JenisPangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JenisPangan>
 */
class JenisPanganFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_jenis_pangan' => 1,
            'nama_jenis'      => $this->faker->word,
            'bobot_jenis'     => $this->faker->randomFloat(2, 0, 1),
            'skor_maks_jenis' => $this->faker->randomFloat(2, 0, 1),
        ];
    }
}