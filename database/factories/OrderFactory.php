<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => fn() => \App\Models\User::factory()->create()->id,
            "token" => $this->faker->sentence(8),
            "placed" => $this->faker->dateTime(),
            "return_date" => $this->faker->dateTime(),
            "status" => "pending",
        ];
    }
}
