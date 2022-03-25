<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'product_id' => $this->faker->numberBetween(1000,9999),
            'product_name' => $this->faker->name,
            'product_price' =>$this->faker->numberBetween(10000,999999),
            'product_sms' => $this->faker->numberBetween(10,9999),
            'product_gift' => $this->faker->numberBetween(500,5000),
            'off_price' => $this->faker->numberBetween(5000,99999)
        ];
    }
}
