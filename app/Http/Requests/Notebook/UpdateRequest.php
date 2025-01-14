<?php

declare(strict_types=1);

namespace App\Http\Requests\Notebook;

use App\Data\DataObjects\Notebook\UpdateRequestData;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'surname' => ['required','string'],
            'patronymic' => ['required','string'],
            'company' => 'string',
            'phone' => 'int',
            'email' => 'email',
            'date_of_birth' => 'date',
            'photo' => 'mimes:jpg,png',
        ];
    }

    public function getData(): UpdateRequestData
    {
        return UpdateRequestData::from($this->validated());
    }
}
