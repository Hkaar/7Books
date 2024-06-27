<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Traits\ModelUpdater;

class ModelUpdaterTest extends TestCase
{
    use ModelUpdater;

    /**
     * Test whether the model update method works
     */
    public function test_update_model(): void
    {
        $user = User::factory()->create();

        $newUsername = "Fred";
        $newPassword = "myP@ssw0rd12345678";
        $newEmail = "fredsick13@test.com";

        $newData = [
            "username" => $newUsername,
            "password" => $newPassword,
            "email" => $newEmail,
        ];

        $this->updateModel($user, $newData);

        $this->assertTrue($user->username === $newUsername);
        $this->assertTrue($user->email === $newEmail);
    }
}
