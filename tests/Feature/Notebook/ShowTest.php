<?php

declare(strict_types=1);

namespace Tests\Feature\Notebook;

use App\Models\Notebook;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function testShowNotebookIsSuccessful(): void
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::all()->random();

        $response = $this->json('GET', "/api/v1/notebook/$notebook->id");

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                'full_name', 'company', 'phone', 'email', 'date_of_birth', 'photo',
            ],]);
    }
}
