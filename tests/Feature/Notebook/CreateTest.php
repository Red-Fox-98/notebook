<?php

declare(strict_types=1);

namespace Tests\Feature\Notebook;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use WithFaker;

    public function testCreateNotebookIsSuccessful(): void
    {
        $notebook = [
            'name' => $this->faker->word(),
            'surname' => $this->faker->word(),
            'patronymic' => $this->faker->word(),
            'company' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => str_replace(['+', '(', ')', '-', '.', ' '], '', $this->faker->phoneNumber()),
            'date_of_birth' => $this->faker->date(),
        ];

        $response = $this->json('POST', '/api/v1/notebook/', $notebook);

        $response->assertStatus(200)->assertJsonStructure(['data' => ['id']]);

        $this->assertDatabaseHas('notebooks', ['email' => $notebook['email']]);
    }
}
