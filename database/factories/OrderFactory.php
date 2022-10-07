<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total'      => $this->faker->numberBetween(100 , 21455),
            'first_name'  => $this->faker->firstname,
            'last_name'   => $this->faker->lastName(),
            'email'       => $this->faker->email(),
            'phone'       => $this->faker->phoneNumber(),
            'address'     => $this->faker->address,
            'city'        => $this->faker->city,
            'post_alcode' => $this->faker->postcode(),
            'country'     => $this->faker->country()
        ];
    }
}
