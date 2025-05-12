<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Kader;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kader>
 */
class KaderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_kader'     => $this->faker->randomNumber(9, true),
            'id_kecamatan' => Kecamatan::factory(),
            'nip'          => $this->faker->numerify('###############'),
            'nama'         => $this->faker->firstName(),
        ];
    }
}