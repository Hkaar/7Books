<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleContentFactory extends Factory
{
    protected $model = ArticleContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => Article::inRandomOrder()->first()->id,  // Random article assignment
            'content' => $this->faker->paragraph,
            'content_type_id' => 1,  // Assuming 1 is the default content type ID, change if needed
            'order' => $this->faker->randomNumber(),
        ];
    }
}
