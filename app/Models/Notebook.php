<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'full_name',
        'company',
        'phone',
        'email',
        'date_of_birth',
        'photo',
    ];
}
