<?php

namespace Tests\Feature;

use App\Models\User;
use App\Traits\ModelUpdater;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelUpdaterTest extends TestCase
{
    use ModelUpdater, RefreshDatabase;

    /**
     * Test whether the model update method works
     *
     * @test
     */
    public function update_model(): void
    {
        $this->seed(TestSeeder::class);

        $user = User::factory()->create();

        $newUsername = 'Fred';
        $newPassword = 'myP@ssw0rd12345678';
        $newEmail = 'fredsick13@test.com';

        $newData = [
            'username' => $newUsername,
            'password' => $newPassword,
            'email' => $newEmail,
        ];

        $this->updateModel($user, $newData);

        $this->assertTrue($user->username === $newUsername);
        $this->assertTrue($user->email === $newEmail);
    }
}
