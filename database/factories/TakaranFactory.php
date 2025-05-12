<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Takaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Takaran>
 */
class TakaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_takaran'   => 1,
            'nama_takaran' => 'Kilogram',
        ];
    }
}