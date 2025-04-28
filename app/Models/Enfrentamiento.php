<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfrentamiento extends Model
{
    use HasFactory;

    protected $table = 'enfrentamiento';

    protected $fillable = [
        'nombre1',
        'imagen1',
        'nombre2',
        'imagen2',
        'fecha',
    ];
}
