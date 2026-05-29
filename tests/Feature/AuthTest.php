<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_requiere_credenciales(): void
    {
        $response = $this->postJson('/api/v1/auth/login', []);

        $response->assertStatus(422); // ← correcto ahora
    }

    public function test_login_con_credenciales_invalidas(): void
    {
        $response = $this->postJson('/api/v1/auth/login', [
            'correo'     => 'noexiste@test.com',
            'contrasena' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
    }
}