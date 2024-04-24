<?php

namespace Tests\Feature;

use App\Models\User;

use Tests\TestCase;

class AuthorTest extends TestCase
{
    /**
     * Test whether the index route is working
     */
    public function test_index(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $response = $this->get('/manage/authors');
        $response->assertStatus(200);
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

        $response = $this->get("/manage/authors/create");
        $response->assertStatus(200);
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

        $response = $this->get("/manage/authors/edit");
        $response->assertStatus(200);
    }
}
