<?php

namespace Tests\Feature\Game;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    public function test_genre_page_can_be_rendered(): void
    {
        Storage::fake();

        $file = UploadedFile::fake()->image('fake.jpg');

        $game = Game::factory()->create();
        $game->addMedia($file)->toMediaCollection();

        $response = $this->get('/genre/' . $game->genre->slug);

        $response->assertStatus(200);
    }
}
