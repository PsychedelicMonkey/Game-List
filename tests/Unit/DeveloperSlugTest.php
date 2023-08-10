<?php

namespace Tests\Unit;

use App\Models\Developer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeveloperSlugTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_slug_is_generated_on_developer_model(): void
    {
        $developer = Developer::factory()->create();
        $this->assertNotNull($developer->slug);
    }
}
