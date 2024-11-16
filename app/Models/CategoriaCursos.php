<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaCursos extends Model
{
    use HasFactory;

    protected $table = 'categoria_cursos';
    protected $fillable = ['categoria'];
}
