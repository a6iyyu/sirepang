<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class KeluargaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function surveyor_dapat_mengisi_data_keluarga(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }
}