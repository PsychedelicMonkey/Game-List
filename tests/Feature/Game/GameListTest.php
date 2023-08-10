<?php

namespace Tests\Feature\Game;

use App\Models\Game;
use App\Models\GameImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_game_list_index_screen_can_be_rendered(): void
    {
        $response = $this->get('/game-list');

        $response->assertStatus(200);
    }

    public function test_game_list_show_screen_can_be_rendered(): void
    {
        $game = Game::factory()->create();
        GameImage::factory()->for($game)->create();

        $response = $this->get('/game-list/' . $game->slug);

        $response->assertStatus(200);
    }

    public function test_game_list_create_screen_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($user)->get('/game-list/create');

        $response->assertStatus(200);
    }

    public function test_game_list_create_screen_cannot_be_accessed_by_guest(): void
    {
        $response = $this->get('/game-list/create');

        $response->assertStatus(403);
    }

    public function test_game_list_create_screen_cannot_be_accessed_by_non_admin(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/game-list/create');

        $response->assertStatus(403);
    }

    public function test_game_list_edit_screen_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $game = Game::factory()->create();

        $response = $this->actingAs($user)->get('/game-list/' . $game->id . '/edit');

        $response->assertStatus(200);
    }

    public function test_game_list_edit_screen_cannot_be_accessed_by_guest(): void
    {
        $game = Game::factory()->create();

        $response = $this->get('/game-list/' . $game->id . '/edit');

        $response->assertStatus(403);
    }

    public function test_game_list_edit_screen_cannot_be_accessed_by_non_admin(): void
    {
        $user = User::factory()->create();
        $game = Game::factory()->create();

        $response = $this->actingAs($user)->get('/game-list/' . $game->id . '/edit');

        $response->assertStatus(403);
    }
}
