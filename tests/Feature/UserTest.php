<?php

namespace Tests\Feature;

use App\Models\User;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test whether the index route is working
     */
    public function test_index(): void
    {
        $user = User::factory()->create([
            "role" => "admin"
        ]);
        $this->actingAs($user);

        $response = $this->get('/manage/users');
        $response->assertStatus(200);
    }

    /**
     * Test whether the create route is working
     */
    public function test_create(): void
    {
        $user = User::factory()->create([
            "role" => "admin"
        ]);
        $this->actingAs($user);

        $response = $this->get("/manage/users/create");
        $response->assertStatus(200);
    }

    /**
     * Test whether the edit route is working
     */
    public function test_edit(): void
    {
        $user = User::factory()->create([
            "role" => "admin"
        ]);
        $this->actingAs($user);

        $response = $this->get("/manage/users/$user->id/edit");
        $response->assertStatus(200);
    }

    /**
     * Test whether the show route is working
     */
    public function test_show(): void
    {
        $user = User::factory()->create([
            "role" => "admin"
        ]);
        $this->actingAs($user);

        $response = $this->get("/manage/users/$user->id");
        $response->assertStatus(200);
    }
}
