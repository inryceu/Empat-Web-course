<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'price' => fake()->randomFloat(2, 5, 60),
        ];
    }
}
