<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Notebook\CreateRequest;
use App\Http\Requests\Notebook\IndexRequest;
use App\Http\Requests\Notebook\UpdateRequest;
use App\Services\Notebook\NotebookService;

class NotebookController extends Controller
{
    public function __construct(private NotebookService $notebookService)
    {
    }

    public function create(CreateRequest $request)
    {
        $notebook = $this->notebookService->create($request->getData());

        return responder()->success(['id' => $notebook->id])->respond();
    }

    public function show(int $id)
    {
        return $this->notebookService->show($id);
    }

    public function index(IndexRequest $request)
    {
        return $this->notebookService->index($request->getData());
    }

    public function update(int $id, UpdateRequest $request)
    {
        return $this->notebookService->update($id, $request->getData());
    }

    public function delete(int $id)
    {
        return $this->notebookService->delete($id);
    }
}
