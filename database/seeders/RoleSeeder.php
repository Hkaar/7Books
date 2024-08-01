<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::ByName('admin')->first()) {
            Role::create(["name" => "admin"]);
        }

        if (!Role::ByName('operator')->first()) {
            Role::create(["name" => "operator"]);
        }

        if (!Role::ByName('member')->first()) {
            Role::create(["name" => "member"]);
        }
    }
}
