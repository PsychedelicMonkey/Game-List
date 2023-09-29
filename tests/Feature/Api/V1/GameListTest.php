<?php

namespace Tests\Feature\Api\V1;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GameListTest extends TestCase
{
    use RefreshDatabase;

    public function test_game_index(): void
    {
        Game::factory(20)->create();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->get('/api/v1/game');

        $response->assertOk();
    }

    public function test_game_store(): void
    {
        Storage::fake();

        Sanctum::actingAs(
            User::factory()->create([
                'is_admin' => true,
            ])
        );

        $response = $this->post('/api/v1/game', [
            'title' => 'Test Game',
            'genre' => 'Test Genre',
            'release_date' => now(),
            'developer' => 'Test Developer',
            'publisher' => 'Test Publisher',
            'tags' => 'Test Tag, Test Tag 2',
            'image' => UploadedFile::fake()->image('fake.jpg'),
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas(Game::class, [
            'title' => 'Test Game'
        ]);
    }

    public function test_game_show(): void
    {
        $game = Game::factory()->create();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->get('/api/v1/game/' . $game->id);

        $response->assertOk();

        $response->assertJsonFragment([
            'title' => $game->title,
        ]);
    }

    public function test_game_update(): void
    {
        $game = Game::factory()->create();

        Sanctum::actingAs(
            User::factory()->create([
                'is_admin' => true,
            ])
        );

        $response = $this->put('/api/v1/game/' . $game->id, [
            'title' => 'Test Game',
            'genre' => 'Test Genre',
            'release_date' => now(),
            'developer' => 'Test Developer',
            'publisher' => 'Test Publisher',
            'tags' => 'Test Tag, Test Tag 2',
        ]);

        $response->assertOk();
    }

    public function test_game_delete(): void
    {
        $game = Game::factory()->create();

        Sanctum::actingAs(
            User::factory()->create([
                'is_admin' => true,
            ])
        );

        $response = $this->delete('/api/v1/game/' . $game->id);

        $response->assertNoContent();

        $this->assertSoftDeleted($game);
    }
}
