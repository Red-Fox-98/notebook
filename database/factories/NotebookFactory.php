<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotebookFactory extends Factory
{
    public function definition()
    {
        return [
            'company'       => $this->faker->word(),
            'date_of_birth' => $this->faker->date(),
            'email'         => $this->faker->unique()->safeEmail(),
            'full_name'     => $this->faker->name(),
            'phone'         => $this->faker->phoneNumber(),
            'photo'         => $this->faker->imageUrl(),
        ];
    }
}
