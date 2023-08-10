<?php

namespace Tests\Unit;

use App\Models\Developer;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameSlugTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_slug_is_generated_on_game_model(): void
    {
        $game = Game::factory()->create();
        $this->assertNotNull($game->slug);
    }
}
