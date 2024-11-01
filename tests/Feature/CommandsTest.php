<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommandsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test whether the make user command works
     *
     * @test
     */
    public function make_user(): void
    {
        $this->seed();

        $name = fake()->name();
        $email = fake()->email();
        $password = '12345678';
        $role = 'admin';

        $command = $this->artisan('make:user', [
            'username' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);

        $command->assertExitCode(0);
    }
}
