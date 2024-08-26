<?php

namespace Tests\Feature;

use App\Models\Region;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test whether the dashboard index route is working
     *
     * @test
     */
    public function dashboard_index(): void
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
     *
     * @test
     */
    public function dashboard_create(): void
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
     *
     * @test
     */
    public function dashboard_edit(): void
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
     *
     * @test
     */
    public function dashboard_show(): void
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
