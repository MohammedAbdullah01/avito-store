<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(2 , true);
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentences(2, true),
            'price' => $this->faker->randomFloat(2 , 0 , 500),
            'sale_price' => $this->faker->randomFloat(2 , 0 , 500),
            'quantity' => $this->faker->randomNumber(3),
            'quantity' => $this->faker->randomNumber(3),
            'main_picture' => $this->faker->imageUrl,
            'sku' => Str::slug($name),
        ];
    }
}
