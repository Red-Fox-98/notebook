<?php

declare(strict_types=1);

namespace App\Http\Requests\Notebook;

use App\Data\DataObjects\Notebook\CreateRequestData;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'surname' => ['required','string'],
            'patronymic' => ['required','string'],
            'company' => ['string', 'nullable'],
            'phone' => ['required', 'int'],
            'email' => ['required','email'],
            'date_of_birth' => ['date', 'nullable'],
            'photo' => ['mimes:jpg,png', 'nullable'],
        ];
    }

    public function getData(): CreateRequestData
    {
        return CreateRequestData::from($this->validated());
    }
}
