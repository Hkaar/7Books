<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create 10 articles
        foreach (range(1, 10) as $index) {
            $article = Article::create([
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'user_id' => rand(1, 20),  // Assuming users with IDs 1 to 3
                'public' => 1,
            ]);

            $article->addMediaFromUrl('https://via.placeholder.com/600x400')
                ->toMediaCollection('images');
        }
    }
}
