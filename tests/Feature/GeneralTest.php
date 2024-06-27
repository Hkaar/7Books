<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    /**
     * Test whether the landing page route is working
     */
    public function test_welcome(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test whether the browse route is working
     */
    public function test_browse(): void
    {
        $response = $this->get('/browse');
        $response->assertStatus(200);
    }

    /**
     * Test whether the member show route is working
     */
    public function test_profile(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/me');
        $response->assertStatus(200);
    }

    /**
     * Test whether the home route is working
     */
    public function test_home()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/home');
        $response->assertStatus(200);
    }
}
