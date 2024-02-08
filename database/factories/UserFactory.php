<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startTimestamp = strtotime('2000-01-01');
        $endTimestamp = strtotime('now');

        $randomTimestamp = rand($startTimestamp, $endTimestamp);

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->userName(),
            'phone' => fake()->unique()->phoneNumber(),
            'dob' => date('Y-m-d', $randomTimestamp),
            'year_of_joining' => date('Y', $randomTimestamp),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'role' => 2,
            'blocked' => rand(0, 2),
            'remember_token' => Str::random(10),
            'profile_image' => fake()->imageUrl(300,300),
            'address' => fake()->address,
            'pincode' => rand(100000,800000),
            'city' => fake()->city,
            'state' => DB::table('states')->get()->random()->id,
            'ca_no' => Str::random(12),
            'gender' => rand(1,2),
            'created_at' => date('Y-m-d H:i:s', $randomTimestamp),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
