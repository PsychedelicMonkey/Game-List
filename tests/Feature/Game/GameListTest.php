<?php

namespace Tests\Feature\Game;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GameListTest extends TestCase
{
    use RefreshDatabase;

    public function test_game_list_index_screen_can_be_rendered(): void
    {
        $response = $this->get('/game-list');

        $response->assertStatus(200);
    }

    public function test_game_list_show_screen_can_be_rendered(): void
    {
        Storage::fake();

        $file = UploadedFile::fake()->image('image.jpg');

        $game = Game::factory()->create();
        $game->addMedia($file)->toMediaCollection();

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

    public function test_game_can_be_created(): void
    {
        UploadedFile::fake();

        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this
            ->actingAs($user)
            ->post('/game-list', [
                'title' => 'Test Game',
                'developer' => 'Test Developer',
                'publisher' => 'Test Publisher',
                'genre' => 'Test Genre',
                'release_date' => now(),
                'image' => UploadedFile::fake()->image('img.jpg'),
                'tags' => 'test,tags',
            ]);

        $response
            ->assertSessionDoesntHaveErrors()
            ->assertRedirect('/game-list');

        $this->assertDatabaseHas('games', [
            'title' => 'Test Game',
        ]);
        $this->assertDatabaseHas('developers', [
            'name' => 'Test Developer',
        ]);
        $this->assertDatabaseHas('publishers', [
            'name' => 'Test Publisher',
        ]);
        $this->assertDatabaseHas('genres', [
            'name' => 'Test Genre',
        ]);
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

    public function test_game_can_be_edited(): void
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $game = Game::factory()->create();

        $response = $this
            ->actingAs($user)
            ->put('/game-list/' . $game->id, [
                'title' => 'Test Game',
                'developer' => 'Test Developer',
                'publisher' => 'Test Publisher',
                'genre' => 'Test Genre',
                'release_date' => now(),
                'tags' => 'test, tags',
            ]);

        $response
            ->assertSessionDoesntHaveErrors()
            ->assertRedirect('/game-list/test-game');

        $game->refresh();

        $this->assertSame('Test Game', $game->title);
        $this->assertSame('Test Developer', $game->developer->name);
        $this->assertSame('Test Publisher', $game->publisher->name);
        $this->assertSame('Test Genre', $game->genre->name);
    }

    public function test_game_cannot_be_deleted_by_guest(): void
    {
        $game = Game::factory()->create();

        $response = $this->delete('/game-list/' . $game->id);

        $response->assertStatus(403);
    }

    public function test_game_cannot_be_deleted_by_non_admin(): void
    {
        $user = User::factory()->create();
        $game = Game::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/game-list/' . $game->id);

        $response->assertStatus(403);
    }

    public function test_game_can_be_deleted(): void
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $game = Game::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/game-list/' . $game->id);

        $response
            ->assertSessionDoesntHaveErrors()
            ->assertRedirect('/game-list');

        $this->assertSoftDeleted($game->fresh());
    }
}
