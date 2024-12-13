<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\TestSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
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
        $this->seed(UserSeeder::class);

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $response = $this->get('/manage/users');
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

        $response = $this->get('/manage/users/create');
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

        $response = $this->get("/manage/users/{$user->id}/edit");
        $response->assertStatus(200);
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

        $response = $this->get("/manage/users/{$user->id}");
        $response->assertStatus(200);
    }
}
