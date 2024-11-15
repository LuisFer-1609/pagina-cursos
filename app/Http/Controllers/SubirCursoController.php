<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubirCursoController extends Controller
{
    function subirCurso()
    {
        return view('auth.subir-curso');
    }

    function postCurso(Request $request)
    {
        $request->validate(
            [
                'portada' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'titulo' => 'required|string',
                'descripcion' => 'required|string'
            ],
            [
                'portada.mimes' => 'Tipo de archivo incorrecto. Sube solamente archivos jpeg, png o jpg',
                'titulo.required' => 'Es obligatorio agregar un título al curso',
                'descripcion.required' => 'Añade una descripción al curso para saber de qué trata'
            ]
        );

        // Curso::create(
        //     [
        //         'imagen' => $request->file('imagen'),
        //         'titulo' => $request->get('titulo'),
        //         'descripcion' => $request->get('descripcion'),
        //         'instructor_id' => Auth::user()->id,
        //     ]
        // );

        // $storage = Storage::putFile('portadas', $request->file('portada'));
        return dd(Auth::user()->id);
    }
}
