<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {username} {email} {password} {level}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $validator = Validator::make([
            "username" => $this->argument("username"),
            "email" =>  $this->argument("email"),
        ], [
            "username" => "unique:users,username",
            "email" => "unique:users,email"
        ]);

        if ($validator->fails()) {
            $this->error("\nUsername or email was already taken!");
            return 0;
        }

        User::factory()->create([
            "username" => $this->argument("username"),
            "password" => Hash::make($this->argument("password")),
            "email" => $this->argument("email"),
            "level" => $this->argument("level"),
        ]);

        $this->info("\nGenerated User Profile\n".
        "----------------------\n".
        "username\t: "  . $this->argument("username")."\n".
        "email\t\t: "   . $this->argument("email")."\n".
        "password\t: "  . $this->argument("password")."\n".
        "level\t\t: "   . $this->argument("level")
        );
    }
}
