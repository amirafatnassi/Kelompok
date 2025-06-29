<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Amira Fatnassi',
            'MobileNumber' => '99059374',
            'Specialization' => 1,
            'email' => 'amirafatnassi88@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            DoctorSeeder::class,
            AppointmentSeeder::class,
            PageSeeder::class,
            SpecializationSeeder::class,
            PatientSeeder::class,
            WorldSeeder::class,
        ]);
    }
}
