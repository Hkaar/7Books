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
        if (!Status::ByName("pending")->first()) {
            Status::create(["name" => "pending"]);
        }
        
        if (!Status::ByName("placed")->first()) {
            Status::create(["name" => "placed"]);
        }

        if (!Status::ByName("not_returned")->first()) {
            Status::create(["name" => "not_returned"]);
        }

        if (!Status::ByName("returned")->first()) {
            Status::create(["name" => "returned"]);
        }

        if (!Status::ByName("returned")->first()) {
            Status::create(["name" => "returned"]);
        }

        if (!Status::ByName("cancelled")->first()) {
            Status::create(["name" => "cancelled"]);
        }
    }
}
