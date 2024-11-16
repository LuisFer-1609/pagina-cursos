<?php

namespace App\Http\Controllers;

use App\Models\CategoriaCursos;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubirCursoController extends Controller
{
    function subirCurso()
    {
        $categorias = CategoriaCursos::all();

        return view('auth.subir-curso', ["categorias" => $categorias]);
    }

    function postCurso(Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required|string',
                'descripcion' => 'required|string',
                'categoria' => 'required|string',
                'portada' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'portada.mimes' => 'Tipo de archivo incorrecto. Sube solamente archivos jpeg, png o jpg',
                'titulo.required' => 'Es obligatorio agregar un título al curso',
                'descripcion.required' => 'Añade una descripción al curso para saber de qué trata'
            ]
        );

        $storagePath = Storage::putFile('portadas', $request->file('portada'));

        // Obtener el MIME type
        $mimeType = Storage::mimeType($storagePath);

        $extension = explode('/', $mimeType)[1];

        Curso::create(
            [
                'titulo' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
                'instructor_id' => Auth::user()->id,
                'categoria_id' => $request->get('categoria'),
                'estado_id' => 1,
                'imagen' => $request->file('portada')->store('portadas', 'public'),
                'mimetype' => $extension,
            ]
        );

        // Mostrar el MIME type
        // return dd($extension);
        // return dd(Auth::user()->id);
        return response()->json(['creado' => 'El curso fue creado correctamente']);
    }
}
