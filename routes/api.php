<?php

declare(strict_types=1);

use App\Http\Controllers\NotebookController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => '/v1/notebook', 'as' => 'api.v1.notebook.'],
    static function () {
        Route::post('/', [NotebookController::class, 'create'])->name('create');
        Route::get('/', [NotebookController::class, 'index'])->name('index');
        Route::get('/{id}', [NotebookController::class, 'show'])->name('show');
        Route::post('/{id}', [NotebookController::class, 'update'])->name('update');
        Route::delete('/{id}', [NotebookController::class, 'delete'])->name('delete');
    }
);
