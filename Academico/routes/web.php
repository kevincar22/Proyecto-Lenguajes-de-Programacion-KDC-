<?php
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AulaController;
/*use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\RegistroController;


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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Verificar si el usuario está autenticado
    if (Auth::check()) {
        // Si el usuario está autenticado, redirigir al home
        return redirect('/home');
    }
    // Si el usuario no está autenticado, mostrar la vista de login
    return view('auth.login');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**Rutas profesor */
Route::get('/Profesores/nuevo', [ProfesorController::class, 'create'])->name('profesor.create');
Route::post('/Profesores', [ProfesorController::class, 'store']);
Route::get('/Profesores', [ProfesorController::class, 'index'])->name('profesor.index');
Route::get('/Profesores/{Profesor}', [ProfesorController::class, 'show'])->name('profesor.show');
Route::put('/Profesores/{Profesor}', [ProfesorController::class, 'update'])->name('profesor.update');
Route::get('/Profesores/{Profesor}/editar', [ProfesorController::class, 'edit'])->name('profesor.edit');
Route::delete('/Profesores/{id}', [ProfesorController::class, 'destroy'])->name('profesor.destroy');

/**Rutas para Aulas */
Route::get('/Aulas/nuevo', [AulaController::class, 'create'])->name('Aulas.create');
Route::post('/Aulas', [AulaController::class, 'store']);
Route::get('/Aulas', [AulaController::class, 'index'])->name('Aulas.index');
Route::get('/Aulas/{Aula}', [AulaController::class, 'show'])->name('aula.show');
Route::put('/Aulas/{Aula}', [AulaController::class, 'update'])->name('Aulas.update');
Route::get('/Aulas/{Aula}/editar', [AulaController::class, 'edit'])->name('Aulas.edit');
Route::delete('/Aulas/{id}', [AulaController::class, 'destroy'])->name('Aulas.destroy');

/**Rutas para materias */
Route::get('/materias/nuevo', [MateriaController::class, 'create'])->name('materia.create');
Route::post('/materias', [MateriaController::class, 'store']);
Route::get('/materias', [MateriaController::class, 'index'])->name('materia.index');
Route::get('/materias/{materia}', [MateriaController::class, 'show'])->name('materia.show');
Route::get('/materias/{materia}/editar', [MateriaController::class, 'edit'])->name('materia.edit');
Route::put('/materias/{materia}', [MateriaController::class, 'update'])->name('materia.update');
Route::delete('/materias/{id}', [MateriaController::class, 'destroy'])->name('materia.destroy');
