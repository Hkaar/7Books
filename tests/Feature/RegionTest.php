<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Role;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test whether the dashboard index route is working
     */
    public function test_dashboard_index(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $this->get('/manage/regions')
            ->assertStatus(200);
    }

    /**
     * Test whether the dashboard create route is working
     */
    public function test_dashboard_create(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $this->get('/manage/regions/create')
            ->assertStatus(200);
    }

    /**
     * Test whether the dashboard edit route is working
     */
    public function test_dashboard_edit(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $region = Region::factory()->create();

        $this->get("/manage/regions/{$region->id}/edit")
            ->assertStatus(200);
    }

    /**
     * Test whether the dashboard show route is working
     */
    public function test_dashboard_show(): void
    {
        $this->seed();

        $user = User::factory()->create([
            'role_id' => Role::ByName('admin')->first()->id,
        ]);
        $this->actingAs($user);

        $region = Region::factory()->create();

        $this->get("/manage/regions/{$region->id}")
            ->assertStatus(200);
    }
}
