<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Author;
use App\Models\Role;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    /**
     * Test whether the index route is working
     */
    public function test_index(): void
    {
        $user = User::factory()->create([
            "role_id" => Role::ByName("admin")->first()->id,
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
            "role_id" => Role::ByName("admin")->first()->id,
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
            "role_id" => Role::ByName("admin")->first()->id,
        ]);
        $this->actingAs($user);

        $author = Author::factory()->create();

        $response = $this->get("/manage/authors/$author->id/edit");
        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        $user = User::factory()->create([
            "role_id" => Role::ByName("admin")->first()->id,
        ]);
        $this->actingAs($user);

        $author = Author::factory()->create();

        $response = $this->get("/manage/authors/$author->id");
        $response->assertStatus(200);
    }
}
