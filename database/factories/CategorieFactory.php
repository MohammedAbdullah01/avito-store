<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'c_name' => $this->faker->words(2 ,true),
            'description' => $this->faker->sentences(2 ,true),
            'avatar' => $this->faker->imageUrl,

        ];
    }
}
