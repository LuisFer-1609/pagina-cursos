<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCurso extends Model
{
    use HasFactory;

    protected $table = 'estado_cursos';
    protected $fillable = ['estado'];
}
