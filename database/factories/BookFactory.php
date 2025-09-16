<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn10' => $this->faker->isbn10(),
            'isbn13' => $this->faker->isbn13(),
            'name' => $this->faker->sentence(),
            'desc' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'rate' => $this->faker->randomFloat(2, 1, 5),
        ];
    }
}
