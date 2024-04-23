<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Tests whether the rating a book route works
     */
    public function test_book_rate(): void 
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/books/8/rate?rating=4');

        $response->assertStatus(200);
    }
}
