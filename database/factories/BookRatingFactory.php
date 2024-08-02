<?php

namespace Database\Factories;

use App\Models\BookRating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookRating>
 */
class BookRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookRating::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fn () => \App\Models\User::factory()->create()->id,
            'book_id' => fn () => \App\Models\Book::factory()->create()->id,
            'rating' => random_int(0, 5),
        ];
    }
}
