<?php

declare(strict_types=1);

namespace Tests\Feature\Notebook;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use WithFaker;

    public function testUpdateNotebookIsSuccessful(): void
    {
        $notebookId = Notebook::all()->random();

        $notebook = [
            'name' => $this->faker->word(),
            'surname' => $this->faker->word(),
            'patronymic' => $this->faker->word(),
            'company' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => str_replace(['+', '(', ')', '-', '.', ' '], '', $this->faker->phoneNumber()),
            'date_of_birth' => $this->faker->date(),
        ];

        $response = $this->json('POST', "/api/v1/notebook/$notebookId->id", $notebook);

        $response->assertStatus(200)->assertJsonStructure(['data' => ['status'],]);

        $this->assertDatabaseHas('notebooks', ['email' => $notebook['email']]);
    }
}
