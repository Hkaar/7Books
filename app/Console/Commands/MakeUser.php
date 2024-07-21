<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {username} {email} {password} {role=member}';

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
        if (Role::count() === 0) {
            $this->error("\nRole table is empty, please seed the database first!");
            return 1;
        }

        $validator = Validator::make([
            "username" => $this->argument("username"),
            "email" =>  $this->argument("email"),
        ], [
            "username" => "unique:users,username",
            "email" => "unique:users,email"
        ]);

        if ($validator->fails()) {
            $this->error("\nUsername or email was already taken!");
            return 1;
        }

        $role = Role::ByName(strtolower($this->argument("role")))->first();

        if (!$role) {
            $this->error("\nRole {$this->argument('role')} does not exist!, or did you perhaps forget to seed the db?");
            return 1;
        }

        $role = $role->id;

        $user = new User();

        $user->fill([
            "name" => $this->argument("username"),
            "username" => $this->argument("username"),
            "password" => $this->argument("password"),
            "email" => $this->argument("email"),
            "role_id" => $role,
        ])->save();

        $this->info("\nGenerated User Profile\n".
            "----------------------\n".
            "username\t: "  . $this->argument("username")."\n".
            "email\t\t: "   . $this->argument("email")."\n".
            "password\t: "  . $this->argument("password")."\n".
            "role\t\t: "   . $this->argument("role")
        );
    }
}
