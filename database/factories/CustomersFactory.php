<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(),
            'social_reason' => $this->faker->unique()->company,
            'legal_status' => 'SARL',
            'capital' => $this->faker->unique()->numberBetween(23560, 100000000),
            'siret_number' => $this->faker->unique()->numberBetween(10000000000000, 99999999999999),
            'naf_code' => $this->faker->unique()->numberBetween(10000, 99999),
            'country' => $this->faker->country,
            'adress' => $this->faker->address,
            'zip_code' => $this->faker->numberBetween(10000, 99999),
            'city' => $this->faker->city,
        ];
    }
}
