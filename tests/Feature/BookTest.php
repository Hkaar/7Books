<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class BookTest extends TestCase
{
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
