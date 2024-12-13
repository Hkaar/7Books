<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleContent;
use Illuminate\Database\Seeder;

class ArticleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 article contents for each article
        Article::all()->each(function ($article) {
            ArticleContent::factory(3)->create([
                'article_id' => $article->id,  // Associate content with the correct article
            ]);
        });
    }
}
