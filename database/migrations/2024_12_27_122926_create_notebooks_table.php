<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'notebooks',
            static function (Blueprint $table) {
                $table->id();
                $table->string('full_name');
                $table->string('company')->nullable();
                $table->string('phone');
                $table->string('email');
                $table->string('date_of_birth')->nullable();
                $table->string('photo')->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notebooks');
    }
};
