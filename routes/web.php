<?php

use App\Constantes as AppConstantes;
use App\Constantes\Constantes as ConstantesConstantes;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubirCursoController;
use Illuminate\Support\Facades\Route;
use App\Models\CategoriaCursos;
use App\Models\Roles;
use App\Constantes\Constantes;
use App\Models\Curso;
use App\Models\EstadoCurso;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $cursos = Curso::with('estado')->where('estado_id', 1)->get();
    // return dd($cursos);
    return view('welcome', ['cursos' => $cursos]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/curso')->group(function () {
        Route::get('/subir-curso', [SubirCursoController::class, 'subirCurso']);
        Route::post('/post-curso', [SubirCursoController::class, 'postCurso']);
        Route::get('/cursos-pendientes', [SubirCursoController::class, 'cursosPendientes']);
        Route::get('/verificar-cursos/{idCurso}', [SubirCursoController::class, 'verificarCursos']);
        Route::post('/verificar-curso', [SubirCursoController::class, 'verificarCurso']);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/crear-rol', function () {
    $roles = ConstantesConstantes::ROLES_USUARIO;
    foreach ($roles as $rol) {
        Roles::create(['rol' => $rol]);
    }

    return response()->json(['response' => 'Roles creado correctamente'], 201);
});

Route::get('/crear-categoria', function () {
    $categorias = ConstantesConstantes::CATEGORIAS_CURSOS;
    foreach ($categorias as $categoryName) {
        CategoriaCursos::create(['categoria' => $categoryName]);
    }

    return response()->json(['response' => 'Categorías creadas correctamente'], 201);
});

Route::get('/crear-estado-curso', function () {
    $estados = ConstantesConstantes::ESTADOS_CURSO;
    foreach ($estados as $estado) {
        EstadoCurso::create(['estado' => $estado]);
    }

    return response()->json(['response' => 'Estados creados correctamente'], 201);
});

require __DIR__ . '/auth.php';
