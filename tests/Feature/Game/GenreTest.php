<?php

namespace Tests\Feature\Game;

use App\Models\Game;
use App\Models\GameImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    public function test_genre_page_can_be_rendered(): void
    {
        $game = Game::factory()->create();
        GameImage::factory()->for($game)->create();

        $response = $this->get('/genre/' . $game->genre->slug);

        $response->assertStatus(200);
    }
}
