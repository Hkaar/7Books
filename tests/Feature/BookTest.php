<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class BookTest extends TestCase
{
    
    /**
     * Test whether the index dashboard route is working
     *
     * @test
     */
    public function index(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $request = $this->get('/manage/books');
        $request->assertStatus(200);
    }

    /**
     * Test whether the create route is working
     *
     * @test
     */
    public function create(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $request = $this->get('/manage/books/create');
        $request->assertStatus(200);
    }

    /**
     * Test whether the edit route is working
     *
     * @test
     */
    public function edit(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $request = $this->get("/manage/books/{$book->id}/edit");
        $request->assertStatus(200);
    }

    /**
     * Test whether the select route is working
     *
     * @test
     */
    public function select(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $request = $this->get('/manage/books/select');
        $request->assertStatus(200);
    }

    /**
     * Test whether the multi select route is working
     *
     * @test
     */
    public function multi_select(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $request = $this->get('/manage/books/multi-select');
        $request->assertStatus(200);
    }

    /**
     * @test
     */
    public function show(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $request = $this->get("/manage/books/{$book->id}");
        $request->assertStatus(200);
    }

    /**
     * Test whether the rating a book route works
     *
     * @test
     */
    public function book_rate(): void
    {
        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $response = $this->post("/books/{$book->id}/rate", [
            "rating" => 4,
        ]);
        $response->assertStatus(200);
    }

    /**
     * Test whether the book display route is working
     *
     * @test
     */
    public function book_display(): void
    {
        $book = Book::factory()->create();

        $response = $this->get('/books/' . $book->id);
        $response->assertStatus(200);
    }
}
