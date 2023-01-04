<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Patient::class;

    public function definition()
    {
        return [

            'fname' => fake()->name(),
            'lname' => fake()->name(),
            'address' => fake()->address(),
            'nextofkin' => fake()->name(),
            'medical_history' => fake()->paragraph(),
            'dob' => fake()->dateTimeBetween('1940-01-01', '2012-12-31')->format('Y-m-d'),
            
        ];
    }
}
