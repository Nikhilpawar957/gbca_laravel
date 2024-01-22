<?php

namespace Database\Factories;

use App\Models\ContactForm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactForm>
 */
class ContactFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactForm::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $startTimestamp = strtotime('2022-01-01');
        $endTimestamp = strtotime('2024-12-31');

        $randomTimestamp = rand($startTimestamp, $endTimestamp);

        return [
            'full_name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->text(),
            'created_at' => date('Y-m-d H:i:s', $randomTimestamp)
        ];
    }
}
