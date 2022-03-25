<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
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
            "customer_id" => Customer::inRandomOrder()->first()->id,
            "product_id" => Product::inRandomOrder()->first()->id,
            "coupon_id" => Coupon::inRandomOrder()->first()->id,
            "pay_price" => $this->faker->numberBetween(25000,700000),
            "payment_gateway" => $this->faker->name(),
            "payment_result" => $this->faker->shuffleString(),
            "payment_time" =>$this->faker->dateTime(),
            "status" => $this->faker->shuffleString(),
            "invoice_code" => $this->faker->numberBetween(1000000,5000000),
        ];
    }
}
