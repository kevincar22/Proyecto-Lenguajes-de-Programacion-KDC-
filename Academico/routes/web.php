<?php
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AulaController;
/*use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;


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

/*Route::resource('Materias', MateriasController::class);
Route::resource('Profesor', ProfesorController::class);
Route::resource('Aulas', AulaController::class);*/

Route::resource('Profesor', ProfesorController::class);
Route::resource('Aulas', AulaController::class);
Route::put('/Aulas/{Aula}', [AulaController::class, 'update'])->name('Aulas.update');
// Route::get('/Aulas', [AulaController::class, 'index'])->name('Aulas.index');
// Route::get('/Aulas/create', [AulaController::class, 'create'])->name('Aulas.create');
// Route::post('/Aulas', [AulaController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/materias/nuevo', [MateriaController::class, 'create'])->name('materia.create');
Route::post('/materias', [MateriaController::class, 'store']);
Route::get('/materias', [MateriaController::class, 'index'])->name('materia.index');
Route::get('/materias/{materia}', [MateriaController::class, 'show'])->name('materia.show');
Route::get('/materias/{materia}/editar', [MateriaController::class, 'edit'])->name('materia.edit');
Route::put('/materias/{materia}', [MateriaController::class, 'update'])->name('materia.update');
Route::delete('/materias/{id}', [MateriaController::class, 'destroy'])->name('materia.destroy');
