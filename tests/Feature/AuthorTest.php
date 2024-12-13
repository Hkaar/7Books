<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\BookSeeder;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test whether the index route is working
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

        $response = $this->get('/manage/authors');
        $response->assertStatus(200);
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

        $response = $this->get('/manage/authors/create');
        $response->assertStatus(200);
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

        $author = Author::factory()->create();

        $response = $this->get("/manage/authors/{$author->id}/edit");
        $response->assertStatus(200);
    }

    /**
     * Test the author show details page
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

        $author = Author::factory()->create();

        $response = $this->get("/manage/authors/{$author->id}");
        $response->assertStatus(200);
    }
}
