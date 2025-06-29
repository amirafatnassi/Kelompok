<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $index = fake()->numberBetween(0, 1);

        $remark = [
            'Cancelled due to incorrect mobile number',
            'Your appointment has been approved.',
        ];

        $status = [
            'Cancelled',
            'Approved.',
        ];
        return [
            'AppointmentNumber' => fake()->biasedNumberBetween(10000, 99999),
            'patient_id' => Patient::inRandomOrder()->first()->id ?? Patient::factory()->create()->id,
            'AppointmentDate' => fake()->date(),
            'AppointmentTime' => fake()->time('H:i:s'),
            'Specialization' => fake()->numberBetween(1, 13),
            'Doctor' => fake()->numberBetween(1, 5),
            'Message' => fake()->text(50),
            'Remark' => $remark[$index],
            'Status' => $status[$index],
        ];
    }
}
