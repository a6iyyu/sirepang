<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Desa>
 */
class DesaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_desa'       => $this->faker->randomNumber(9),
            'id_kecamatan'  => Kecamatan::factory(),
            'nama_desa'     => $this->faker->city,
            'kode_wilayah'  => $this->faker->numerify('##.##.##'),
        ];
    }
}