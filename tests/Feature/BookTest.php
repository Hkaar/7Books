<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * Tests whether the index dashboard route is working
     */
    public function test_index(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $request = $this->get("/manage/books");

        $request->assertStatus(200);
    }

    /**
     * Tests whether the CRUD create route is working 
     */
    public function test_create(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $request = $this->get("/manage/books/create");

        $request->assertStatus(200);
    }

    /**
     * Tests whether the CRUD edit route is working 
     */
    public function test_edit(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $request = $this->get("/manage/books/create");

        $request->assertStatus(200);
    }

    /**
     * Tests whether the CRUD select route is working 
     */
    public function test_select(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $request = $this->get("/manage/books/select");

        $request->assertStatus(200);
    }

    /**
     * Tests whether the CRUD multi select route is working 
     */
    public function test_multi_select(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $request = $this->get("/manage/books/multi-select");

        $request->assertStatus(200);
    }

    /**
     * Tests whether the rating a book route works
     */
    public function test_book_rate(): void 
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $response = $this->post('/books/8/rate?rating=4');

        $response->assertStatus(200);
    }
}
