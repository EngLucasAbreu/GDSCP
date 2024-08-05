<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PacientController;

Route::get('/', [PacientController::class, 'index']);

Route::get('/dashboard', [PacientController::class, 'dashboard']);

Route::get('/cadastrar-cliente', [PacientController::class, 'cadastrarCliente']);

Route::get('/evolucao', [PacientController::class, 'evolucao']);

Route::get('/visualizar', [PacientController::class, 'visualizar']);

Route::get('/evoluir', [PacientController::class, 'evoluir']);

Route::get('/local-lesao', [PacientController::class, 'localLesao']);

Route::get('/sala', [PacientController::class, 'sala']);

Route::get('/leito', [PacientController::class, 'leito']);

Route::get('/tipo-lesao', [PacientController::class, 'tipoLesao']);

Route::get('/tipo-tratamento', [PacientController::class, 'tipoTratamento']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
