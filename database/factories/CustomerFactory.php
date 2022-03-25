<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'fName' => $this->faker->firstName,
            'lName' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'mobile_number' => $this->faker->phoneNumber,
            'is_registered' => $this->faker->boolean,
            'register_time' =>$this->faker->dateTime('now'),
            'introduce_code' => $this->faker->numberBetween(1000000,56464684984),
            'used_intro_code_times' =>$this->faker->numberBetween(1,50)
        ];
    }
}
