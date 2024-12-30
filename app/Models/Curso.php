<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $fillable = ['titulo', 'descripcion', 'instructor_id', 'categoria_id', 'estado_id', 'imagen', 'mimetype'];

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoCurso::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaCursos::class);
    }

    public function lecciones(): BelongsTo
    {
        return $this->belongsTo(CategoriaCursos::class);
    }
}
