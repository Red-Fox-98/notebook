<?php

declare(strict_types=1);

namespace App\Http\Requests\Notebook;

use App\Data\DataObjects\Notebook\IndexRequestData;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'perPage' => [ 'int' ],
        ];
    }

    public function getData(): IndexRequestData
    {
        return IndexRequestData::from($this->validated());
    }
}
