<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TransactionFactory extends Factory
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
            'date'=> fake()->dateTimeBetween('2020-01-01', '2024-12-31'),
            'pay_mode'=> fake()->randomElement(['cash', 'bank', 'credit_card'])
        ];
    }
}
