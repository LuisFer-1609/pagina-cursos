<?php

namespace App\Http\Controllers;

use App\Models\CategoriaCursos;
use App\Models\Curso;
use App\Models\Lecciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SubirCursoController extends Controller
{
    function subirCurso()
    {
        $categorias = CategoriaCursos::all();

        return view('auth.subir-curso', ["categorias" => $categorias,]);
    }

    function postCurso(Request $request)
    {
        // return dd($request->all());

        $request->validate(
            [
                'titulo' => 'required|string',
                'descripcion' => 'required|string',
                'categoria' => 'required|string',
                'portada' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                //'lecciones' => 'required|file|mimes:mp4,mov,webm,ogg,avi|max:614400', // max en kilobytes, ejemplo 100 MB
            ],
            [
                'titulo.required' => 'Es obligatorio agregar un título al curso',
                'descripcion.required' => 'Añade una descripción al curso para saber de qué trata',
                'categoria.required' => 'Es necesario seleccionar una categoría para el curso',
                'portada.required' => 'Debes subir una imagen de portada',
                'portada.image' => 'El archivo de portada debe ser una imagen',
                'portada.mimes' => 'Tipo de archivo incorrecto. Sube solamente archivos jpeg, png o jpg',
                'portada.max' => 'La imagen de portada no debe superar los 2 MB',
                // 'lecciones.required' => 'Debes subir al menos un archivo de video para las lecciones',
                // 'lecciones.file' => 'El archivo de lección debe ser un archivo válido',
                // 'lecciones.mimes' => 'Solo se permiten videos en los formatos mp4, mov, webm, ogg o avi',
                // 'lecciones.max' => 'El tamaño del video no debe superar los 100 MB',
            ]
        );


        $storagePathPortadaCurso = Storage::putFile('cursos/portadas', $request->file('portada'));
        // $storagePathVideosCurso = Storage::putFile('lecciones/videos', $request->file('lecciones'));

        // Obtener el MIME type
        $mimeTypePortadaCurso = Storage::mimeType($storagePathPortadaCurso);

        $extensionPortadaCurso = explode('/', $mimeTypePortadaCurso)[1];

        $curso = Curso::create(
            [
                'titulo' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
                'instructor_id' => Auth::user()->id,
                'categoria_id' => $request->get('categoria'),
                'estado_id' => 1,
                'imagen' => $request->file('portada')->store('cursos/portadas', 'public'),
                'mimetype' => $extensionPortadaCurso,
            ]
        );

        // $lecciones = Lecciones::create(
        //     []
        // );

        // Mostrar el MIME type
        // return dd($extension);
        // return dd(Auth::user()->id);
        return response()->json(['creado' => 'El curso fue creado correctamente']);
    }

    function cursosPendientes()
    {
        $cursos = Curso::with('estado')->where('estado_id', 1)->get();
        return view('auth.cursos-pendientes', ['cursos' => $cursos]);
    }

    function verificarCursos($idCurso)
    {
        $curso = DB::table('cursos')
            ->join('lecciones', 'cursos.id', '=', 'lecciones.curso_id')
            ->select('cursos.*', 'lecciones.*')
            ->get();

        // lógica para encriptar el id del curso
        $idCurso = base64_encode($idCurso);
        return view('auth.verificar-cursos', ['curso' => $curso, 'idCurso' => $idCurso]);
    }

    function verificarCurso(Request $request)
    {
        $idCurso = base64_decode($request->get('idCurso'));
        Curso::updated($idCurso, ['estado_id' => 2]);

        return response()->json(['verificado' => 'El curso fue verificado correctamente']);
    }
}
