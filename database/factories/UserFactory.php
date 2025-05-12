<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Kader;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'id_user'  => rand(1, 33),
            'username' => Faker::create()->userName(),
            'password' => bcrypt('password'),
            'tipe'     => 'kader',
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => []);
    }

    public function kader(): static
    {
        return $this->has(Kader::factory(), 'kader');
    }
}