<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Notebook;
use Flugg\Responder\Transformers\Transformer;

class NotebookTransformer extends Transformer
{
    public function transform(Notebook $notebook): array
    {
        return [
            'id' => $notebook->id,
            'full_name' => $notebook->full_name,
            'company' => $notebook->company,
            'phone' => $notebook->phone,
            'email' => $notebook->email,
            'date_of_birth' => $notebook->date_of_birth,
            'photo' => $notebook->photo,
        ];
    }
}
