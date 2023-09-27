<?php

namespace Api\V1;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_to_api(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertOk();

        // Assert JSON has token and user keys
        $response->assertJsonStructure([
            'token',
            'user',
        ]);

        // Assert the user's name is included in response
        $response->assertJsonFragment([
            'name' => $user->name,
        ]);
    }

    public function test_user_can_fetch_credentials_with_token(): void
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->get('/api/v1/user');

        $response->assertOk();

        // Assert the user's name is included in response
        $response->assertJsonFragment([
            'name' => $user->name,
        ]);
    }

    public function test_user_can_logout_with_token(): void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->post('/api/v1/logout');

        $response->assertNoContent();
    }
}
