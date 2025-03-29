<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PphTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function admin_dapat_mengekspor_rekap_pph(): void
    {
        $this->actingAs(User::create([
            'username'  => '123',
            'password'  => '123123',
            'tipe'      => 'admin',
        ]));
        
        $response = $this->post(route('ekspor-pph', ['tahun' => 2025]));
        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename=rekap-pph-2025.xlsx');
    }
}