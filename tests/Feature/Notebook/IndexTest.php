<?php

declare(strict_types=1);

namespace Tests\Feature\Notebook;

use Tests\TestCase;

class IndexTest extends TestCase
{
    public function testIndexNotebookIsSuccessful(): void
    {
        $perPage = rand(5, 10);
        $page = rand(1, 3);

        $response = $this->json('GET', '/api/v1/notebook/', ['perPage' => $perPage, 'page' => $page]);

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => ['full_name', 'company', 'phone', 'email', 'date_of_birth', 'photo'],
            ],
        ]);
    }
}
