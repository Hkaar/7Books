<?php

namespace Database\Seeders;

use App\Models\BookRating;
use App\Models\Order;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->has(Order::factory()->count(3), 'orders')
            ->has(BookRating::factory()->count(3), 'ratings')
            ->create();
    }
}
