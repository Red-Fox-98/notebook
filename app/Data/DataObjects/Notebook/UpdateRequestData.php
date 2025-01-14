<?php

declare(strict_types=1);

namespace App\Data\DataObjects\Notebook;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UpdateRequestData extends Data
{
    public function __construct(
        public string $name,
        public string $surname,
        public string $patronymic,
        public string | null $company,
        public string | null $phone,
        public string | null $email,
        public string | null $dateOfBirth,
        public string | null $photo,
    ) {
    }
}
