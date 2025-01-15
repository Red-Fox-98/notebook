<?php

declare(strict_types=1);

namespace App\Services\Notebook;

use App\Data\DataObjects\Notebook\CreateRequestData;
use App\Data\DataObjects\Notebook\IndexRequestData;
use App\Data\DataObjects\Notebook\UpdateRequestData;
use App\Models\Notebook;
use App\Transformers\NotebookTransformer;

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

    final public function show(int $id)
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::query()->find($id);
        if (!$notebook) {
            return responder()->error('404', 'Not Found')->respond(404);
        }

        return responder()->success($notebook, new NotebookTransformer())->respond();
    }

    final public function index(IndexRequestData $request)
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::query()->paginate($request->perPage ?? 10);

        return responder()->success($notebook, new NotebookTransformer())->respond();
    }

    final public function update(int $id, UpdateRequestData $request)
    {
        /** @var Notebook $notebook */
        $notebook = Notebook::query()->find($id);

        if (!$notebook) {
            return responder()->error('404', 'Not Found')->respond(404);
        }

        $fullName = $request->name . ' ' . $request->surname . ' ' . $request->patronymic;

        $notebook->update([
            'full_name' => $fullName,
            'company' => $request->company,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->dateOfBirth,
            'photo' => $request->photo,
        ]);

        return responder()->success(['status' => 'Successfully updated'])->respond();
    }

    final public function delete(int $id)
    {
        Notebook::query()->find($id)->delete();

        return responder()->success(['status' => 'Successfully deleted'])->respond();
    }
}
