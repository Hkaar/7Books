<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;

use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * Test whether the index dashboard route is working
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
     * Test whether the create route is working 
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
     * Test whether the edit route is working 
     */
    public function test_edit(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $request = $this->get("/manage/books/$book->id/edit");
        $request->assertStatus(200);
    }

    /**
     * Test whether the select route is working 
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
     * Test whether the multi select route is working 
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

    public function test_show(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $request = $this->get("/manage/books/$book->id");
        $request->assertStatus(200);
    }

    /**
     * Test whether the rating a book route works
     */
    public function test_book_rate(): void 
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $response = $this->post("/books/$book->id/rate?rating=4");
        $response->assertStatus(200);
    }

    /**
     * Test whether the book display route is working
     */
    public function test_book_display(): void
    {
        $book = Book::factory()->create();

        $response = $this->get("/books/" . $book->id);
        $response->assertStatus(200);
    }
}
