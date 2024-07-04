<?php

namespace Database\Seeders;

use App\Models\Status;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            "name" => "pending",
        ]);

        Status::create([
            "name" => "placed",
        ]);

        Status::create([
            "name" => "not_returned",
        ]);

        Status::create([
            "name" => "returned",
        ]);

        Status::create([
            "name" => "cancelled",
        ]);
    }
}
