<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            ArticleContentSeeder::class,
            ArticleSeeder::class,
            ContentTypeSeeder::class,
            RegionSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}
