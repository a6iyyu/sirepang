<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function admin_dapat_masuk_ke_akunnya(): void
    {
        /** @var User $admin */
        $admin = User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'tipe'     => 'admin',
        ]);

        $response = $this->post(route('login'), [
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect();
    }

    #[Test]
    public function surveyor_dapat_masuk_ke_akunnya(): void
    {
        /** @var User $kader */
        $kader = User::factory()->create([
            'username' => '123456789101112131',
            'password' => bcrypt('12345678'),
            'tipe'     => 'kader',
        ]);

        $response = $this->post(route('login'), [
            'username' => '123456789101112131',
            'password' => '12345678',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($kader);
        $response->assertRedirect();
    }
}