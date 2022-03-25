<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coupon_name' => $this->faker->name(),
            'active' =>$this->faker->boolean(),
            'total_amount' => $this->faker->numberBetween(50,1000),
            'used_amount' => 0,
            'discount_percent' => $this->faker->numberBetween(5,90),
            'discount_percent_toman'=>$this->faker->numberBetween(1000,90000)
        ];
    }
}
