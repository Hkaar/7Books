<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
