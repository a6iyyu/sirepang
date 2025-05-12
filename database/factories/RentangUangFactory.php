<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\RentangUang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RentangUang>
 */
class RentangUangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_rentang_uang' => $this->faker->randomNumber(9, true),
            'batas_bawah'     => $this->faker->randomNumber(9, true),
            'batas_atas'      => $this->faker->randomNumber(9, true),
        ];
    }
}