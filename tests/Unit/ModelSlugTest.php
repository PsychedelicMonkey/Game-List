<?php

namespace Tests\Unit;


use App\Models\Developer;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelSlugTest extends TestCase
{
    use RefreshDatabase;

    public function test_slug_is_generated_on_developer_model(): void
    {
        $developer = Developer::factory()->create();
        $this->assertNotNull($developer->slug);
    }

    public function test_slug_is_generated_on_game_model(): void
    {
        $game = Game::factory()->create();
        $this->assertNotNull($game->slug);
    }

    public function test_slug_is_generated_on_genre_model(): void
    {
        $genre = Genre::factory()->create();
        $this->assertNotNull($genre->slug);
    }

    public function test_slug_is_generated_on_publisher_model(): void
    {
        $publisher = Publisher::factory()->create();
        $this->assertNotNull($publisher->slug);
    }
}
