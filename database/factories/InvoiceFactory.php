<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num'=>'2025/'.Str::random(4),
            'date'=> fake()->dateTimeBetween('2025-01-01', '2025-12-31'),
            'pay_mode'=> fake()->randomElement(['cash', 'bank_transfer', 'credit_card']),
            'amount'=> fake()->randomFloat(2, 1000, 100000),
            'type'=> fake()->randomElement(['invoice', 'storno']),
            'comment'=> fake()->optional()->sentence(),
        ];
    }
}
