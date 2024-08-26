<?php

namespace Tests\Feature;

use App\Models\Genre;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\BookSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test whether the index route is working
     *
     * @test
     */
    public function test_dashboard_index(): void
    {
        $this->seed();
        $this->seed(BookSeeder::class);

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $response = $this->get('/manage/genres');
        $response->assertStatus(200);
    }

    /**
     * Test whether the create route is working
     *
     * @test
     */
    public function test_dashboard_create(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $response = $this->get('/manage/genres/create');
        $response->assertStatus(200);
    }

    /**
     * Test whether the edit route is working
     *
     * @test
     */
    public function test_dashboard_edit(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $genre = Genre::factory()->create();

        $response = $this->get("/manage/genres/{$genre->id}/edit");
        $response->assertStatus(200);
    }

    /**
     * Test whether the show route is working
     *
     * @test
     */
    public function test_dashboard_show(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $genre = Genre::factory()->create();

        $response = $this->get("/manage/genres/{$genre->id}");
        $response->assertStatus(200);
    }
}
