<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kecamatan>
 */
class KecamatanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_kecamatan'   => $this->faker->unique()->numerify('#'),
            'nama_kecamatan' => $this->faker->city,
            'kode_wilayah'   => $this->faker->numerify('##.##.##'),
        ];
    }
}