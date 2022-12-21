<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Grupes pavadinimas ' . $this->faker->unique()->numberBetween(1, 100),
            'description' => $this->faker->text(200), // 200 simboliu
            'teacher' => $this->faker->firstName(). ' ' . $this->faker->lastName()
            //
        ];
    }
}
