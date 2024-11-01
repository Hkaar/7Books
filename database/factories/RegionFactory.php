<?php

namespace Database\Factories;

use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $timezones = DateTimeZone::listIdentifiers();
        shuffle($timezones);

        $timezone = array_pop($timezones);

        return [
            'name' => $timezone . $this->faker->randomDigit() . $this->faker->sentence(),
            'desc' => $this->faker->paragraph(),
            'timezone' => $timezone,
        ];
    }
}
