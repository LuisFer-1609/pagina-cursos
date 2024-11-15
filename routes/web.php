<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubirCursoController;
use App\Models\Roles;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/subir-curso', [SubirCursoController::class, 'subirCurso']);
Route::post('/post-curso', [SubirCursoController::class, 'postCurso']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/crear-rol', function () {
//     Roles::create([
//         'rol' => 'usuario'
//     ]);

//     return response()->json(['response' => 'Rol creado correctamente'], 201);
// });

require __DIR__ . '/auth.php';
