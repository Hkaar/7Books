<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Order;

use Tests\TestCase;

class OrderTest extends TestCase
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

        $response = $this->get('/manage/orders');
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

        $response = $this->get("/manage/orders/create");
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

        $order = Order::factory()->create();

        $response = $this->get("/manage/orders/$order->id/edit");
        $response->assertStatus(200);
    }

    /**
     * Test whether the show route is working
     */
    public function test_show(): void
    {
        $user = User::factory()->create([
            "level" => "admin"
        ]);
        $this->actingAs($user);

        $order = Order::factory()->create();

        $response = $this->get("/manage/orders/$order->id");
        $response->assertStatus(200);
    }
}
