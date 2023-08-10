<?php

namespace Tests\Unit;

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreSlugTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_slug_is_generated_on_genre_model(): void
    {
        $genre = Genre::factory()->create();
        $this->assertNotNull($genre->slug);
    }
}
