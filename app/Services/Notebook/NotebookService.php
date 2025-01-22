<?php

declare(strict_types=1);

namespace App\Services\Notebook;

use App\Data\DataObjects\Notebook\CreateRequestData;
use App\Data\DataObjects\Notebook\IndexRequestData;
use App\Data\DataObjects\Notebook\UpdateRequestData;
use App\Models\Notebook;

class NotebookService
{
    final public function create(CreateRequestData $request): Notebook
    {
        $fullName = $request->name . ' ' . $request->surname . ' ' . $request->patronymic;
        /** @var Notebook $notebook */
        $notebook = Notebook::query()->create(
            [
                'full_name' => $fullName,
                'company' => $request->company,
                'phone' => $request->phone,
                'email' => $request->email,
                'date_of_birth' => $request->dateOfBirth,
                'photo' => $request->photo,
            ]
        );

        return $notebook;
    }

    final public function show(int $id): ?Notebook
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::query()->find($id);

        return $notebook;
    }

    final public function index(IndexRequestData $request): array
    {
        return Notebook::query()->paginate($request->perPage ?? config('pagination.defaultPerPage'))->items();
    }

    final public function update(int $id, UpdateRequestData $request): ?Notebook
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::query()->find($id);

        //По тз требовалось соединить в ФИО
        $fullName = $request->name . ' ' . $request->surname . ' ' . $request->patronymic;

        $notebook->update([
            'full_name' => $fullName,
            'company' => $request->company,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->dateOfBirth,
            'photo' => $request->photo,
        ]);

        return $notebook;
    }

    final public function delete(int $id): void
    {
        Notebook::query()->find($id)->delete();
    }
}
