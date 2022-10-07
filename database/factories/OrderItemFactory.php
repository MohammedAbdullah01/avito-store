<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class order_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(100 , 2147483640),
            'quantity' => $this->faker->randomDigitNotZero(),

        ];
    }
}
