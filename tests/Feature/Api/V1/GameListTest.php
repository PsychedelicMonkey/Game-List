<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameListTest extends TestCase
{
    use RefreshDatabase;

    // TODO: Write feature tests for Game API CRUD
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
