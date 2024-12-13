<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\BookSeeder;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test whether the index dashboard route is working
     *
     * @test
     */
    public function test_dashboard_index(): void
    {
        $this->seed(TestSeeder::class);
        $this->seed(BookSeeder::class);

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
    public function test_dashboard_create(): void
    {
        $this->seed(TestSeeder::class);

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
    public function test_dashboard_edit(): void
    {
        $this->seed(TestSeeder::class);

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
        $this->seed(TestSeeder::class);
        $this->seed(BookSeeder::class);

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
        $this->seed(TestSeeder::class);
        $this->seed(BookSeeder::class);

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $request = $this->get('/manage/books/multi-select');
        $request->assertStatus(200);
    }

    /**
     * Test whether the show route is working
     *
     * @test
     */
    public function test_dashboard_show(): void
    {
        $this->seed(TestSeeder::class);

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
        $this->seed(TestSeeder::class);

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $book = Book::factory()->create();

        $response = $this->post("/books/{$book->id}/rate", [
            'rating' => 4,
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
        $this->seed(TestSeeder::class);

        $book = Book::factory()->create();

        $response = $this->get('/books/' . $book->id);
        $response->assertStatus(200);
    }
}
