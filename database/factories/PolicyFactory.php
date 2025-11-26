<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PolicyFactory extends Factory
{
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'policy_number' => 'POL-' . fake()->unique()->numerify('######'),
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'type' => fake()->randomElement(['Auto', 'Health', 'Life', 'Property']),
            'coverage_amount' => fake()->randomFloat(2, 10000, 500000),
            'premium_amount' => fake()->randomFloat(2, 100, 5000),
            'start_date' => $startDate,
            'end_date' => fake()->dateTimeBetween($startDate, '+2 years'),
            'status' => fake()->randomElement(['Active', 'Expired', 'Cancelled']),
            'branch_id' => Branch::inRandomOrder()->first()->id,
        ];
    }
}
