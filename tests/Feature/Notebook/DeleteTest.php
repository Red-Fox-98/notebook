<?php

declare(strict_types=1);

namespace Tests\Feature\Notebook;

use App\Models\Notebook;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    public function testDeleteNotebookIsSuccessful(): void
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::all()->random();

        $response = $this->json('DELETE', "/api/v1/notebook/$notebook->id");

        $response->assertStatus(200)->assertJsonStructure(['data' => ['status'],]);

        $this->assertDatabaseMissing('notebooks', ['id' => $notebook->id]);
    }
}
