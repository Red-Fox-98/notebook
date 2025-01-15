<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Notebook;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Notebook::factory()->count(32)->create();
    }
}
