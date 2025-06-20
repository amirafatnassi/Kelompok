<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{

    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'date_of_birth' => $this->faker->date('Y-m-d', '-18 years'),
            'gender'     => $this->faker->randomElement(['male', 'female', 'other']),
            'phone'      => $this->faker->phoneNumber,
            'email'      => $this->faker->unique()->safeEmail,

            'address_line1' => $this->faker->streetAddress,
            'address_line2' => $this->faker->optional()->secondaryAddress,
            'city'          => $this->faker->city,
            'state'         => $this->faker->state,
            'postal_code'   => $this->faker->postcode,
            'country'       => $this->faker->country,

            'medical_record_number' => Str::uuid(),
           // 'medical_record_number' => (string) Str::uuid(),

            'insurance_provider'    => $this->faker->company,
            'insurance_policy_number' => Str::random(10),
            'allergies'             => $this->faker->words(3, true),
            'existing_conditions'   => $this->faker->words(2, true),

            'emergency_contact_name'  => $this->faker->name,
            'emergency_contact_phone' => $this->faker->phoneNumber,
        ];
    }
}
