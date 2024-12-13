<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\TestSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
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

        $response = $this->get('/manage/orders');
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

        $response = $this->get('/manage/orders/create');
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

        $order = Order::factory()->create();

        $response = $this->get("/manage/orders/{$order->id}/edit");
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

        $order = Order::factory()->create();

        $response = $this->get("/manage/orders/{$order->id}");
        $response->assertStatus(200);
    }
}
