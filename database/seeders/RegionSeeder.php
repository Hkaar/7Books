<?php

namespace Database\Seeders;

use App\Models\Library;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::factory()
            ->count(10)
            ->has(Library::factory()->count(1), 'libraries')
            ->create();
    }
}
