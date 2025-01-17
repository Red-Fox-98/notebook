<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotebookFactory extends Factory
{
    public function definition()
    {
        $fullName = $this->faker->word() . ' ' . $this->faker->word() . ' ' . $this->faker->word();

        return [
            'full_name' => $fullName,
            'company' => $this->faker->company(),
            'phone' => str_replace(['+', '(', ')', '-', '.', ' '], '', $this->faker->phoneNumber()),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->date(),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
