<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Notebook\CreateRequest;
use App\Http\Requests\Notebook\IndexRequest;
use App\Http\Requests\Notebook\UpdateRequest;
use App\Services\Notebook\NotebookService;
use App\Transformers\NotebookTransformer;
use Illuminate\Http\JsonResponse;

class NotebookController extends Controller
{
    public function __construct(private NotebookService $notebookService)
    {
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $notebook = $this->notebookService->create($request->getData());

        return responder()->success(['id' => $notebook->id])->respond();
    }

    public function show(int $id): JsonResponse
    {
        $notebook = $this->notebookService->show($id);
        if (!$notebook) {
            return responder()->error('404', 'Not Found')->respond(404);
        }

        return responder()->success($notebook, new NotebookTransformer())->respond();
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $notebook = $this->notebookService->index($request->getData());

        return responder()->success($notebook, new NotebookTransformer())->respond();
    }

    public function update(int $id, UpdateRequest $request): JsonResponse
    {
        $notebook = $this->notebookService->update($id, $request->getData());
        if (!$notebook) {
            return responder()->error('404', 'Not Found')->respond(404);
        }

        return responder()->success(['status' => 'Successfully updated'])->respond();
    }

    public function delete(int $id): JsonResponse
    {
        $this->notebookService->delete($id);

        return responder()->success(['status' => 'Successfully deleted'])->respond();
    }
}
