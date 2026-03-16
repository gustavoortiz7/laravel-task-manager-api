<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678'
        ]);

        $response->assertStatus(201);
    }

    public function test_user_can_login()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('12345678')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => '12345678'
        ]);

        $response->assertStatus(200);
    }
}
