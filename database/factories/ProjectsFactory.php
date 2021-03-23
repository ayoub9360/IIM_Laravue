<?php

namespace Database\Factories;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProjectsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projects::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeThisYear->format('Y-m-d');
        return [
            'title' => $this->faker->sentence($nbWords = 4),
            'description' => $this->faker->text(),
            'start_date' => $date,
            'end_date' => $this->faker->dateTimeBetween($startDate = $date, $endDate = 'now')->format('Y-m-d'),
            'finished' => $this->faker->numberBetween(0,2),
            'day_sold' => $this->faker->numberBetween(5, 58),
            'customer_id' => DB::table('customers')->get('id')->random(1)->first()->id,
            'responsable_name' => $this->faker->firstName,
            'responsable_surname' => $this->faker->lastName,
            'responsable_number' => $this->faker->e164PhoneNumber,
        ];
    }
}
