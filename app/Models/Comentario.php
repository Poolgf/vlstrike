<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentario';

    protected $fillable = [
        'rango',
        'usuario_id',
        'comentario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
