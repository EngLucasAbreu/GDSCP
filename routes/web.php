<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\FerramentasController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/pacientes/create', [PacientController::class, 'create'])->name('create');
Route::get('/pacientes/read', [PacientController::class, 'read'])->name('read');
Route::get('/pacientes/read-all', [PacientController::class, 'read_all'])->name('read-all');

Route::post('/ferramentas/create-sala', [FerramentasController::class, 'createSala'])->name('create-sala');
Route::get('/ferramentas/read-sala', [FerramentasController::class, 'readSala'])->name('read-sala');
Route::get('/ferramentas/read-all-salas', [FerramentasController::class, 'readAllSalas'])->name('read-all-salas');
Route::post('/ferramentas/update-sala', [FerramentasController::class, 'updateSala'])->name('update-sala');
Route::post('/ferramentas/delete-sala', [FerramentasController::class, 'deleteSala'])->name('delete-sala');

Route::post('/ferramentas/create-leito', [FerramentasController::class, 'createLeito'])->name('create-leito');
Route::get('/ferramentas/read-leito', [FerramentasController::class, 'readLeito'])->name('read-leito');
Route::get('/ferramentas/read-all-leitos', [FerramentasController::class, 'readAllLeitos'])->name('read-all-leitos');
Route::post('/ferramentas/update-leito', [FerramentasController::class, 'updateLeito'])->name('update-leito');
Route::post('/ferramentas/delete-leito', [FerramentasController::class, 'deleteLeito'])->name('delete-leito');

Route::post('/ferramentas/create-tratamento', [FerramentasController::class, 'createTratamento'])->name('create-tratamento');
Route::get('/ferramentas/read-tratamento', [FerramentasController::class, 'readTratamento'])->name('read-tratamento');
Route::get('/ferramentas/read-all-tratamentos', [FerramentasController::class, 'readAllTratamentos'])->name('read-all-tratamentos');
Route::post('/ferramentas/update-tratamento', [FerramentasController::class, 'updateTratamento'])->name('update-tratamento');
Route::post('/ferramentas/delete-tratamento', [FerramentasController::class, 'deleteTratamento'])->name('delete-tratamento');

Route::post('/ferramentas/create-lesao', [FerramentasController::class, 'createLesao'])->name('create-lesao');
Route::get('/ferramentas/read-lesao', [FerramentasController::class, 'readLesao'])->name('read-lesao');
Route::get('/ferramentas/read-all-lesoes', [FerramentasController::class, 'readAllLesoes'])->name('read-all-lesoes');
Route::post('/ferramentas/update-lesao', [FerramentasController::class, 'updateLesao'])->name('update-lesao');
Route::post('/ferramentas/delete-lesao', [FerramentasController::class, 'deleteLesao'])->name('delete-lesao');

Route::post('/ferramentas/create-comorbidade', [FerramentasController::class, 'createComorbidade'])->name('create-comorbidade');
Route::get('/ferramentas/read-comorbidade', [FerramentasController::class, 'readComorbidade'])->name('read-comorbidade');
Route::get('/ferramentas/read-all-comorbidades', [FerramentasController::class, 'readAllComorbidades'])->name('comorbidades.index');
Route::post('/ferramentas/update-comorbidade', [FerramentasController::class, 'updateComorbidade'])->name('update-comorbidade');
Route::delete('/ferramentas/delete-comorbidade/{id}', [FerramentasController::class, 'deleteComorbidade'])->name('delete-comorbidade');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PacientController::class, 'dashboard'])->name('dashboard');
    Route::get('/cadastrar-paciente', [PacientController::class, 'cadastrarPaciente']);
    Route::get('/evolucao', [PacientController::class, 'evolucao']);
    Route::get('/visualizar', [PacientController::class, 'visualizar']);
    Route::get('/evoluir', [PacientController::class, 'evoluir']);
    Route::get('/local-lesao', [PacientController::class, 'localLesao']);
    Route::get('/sala', [PacientController::class, 'sala']);
    Route::get('/leito', [PacientController::class, 'leito']);
    Route::get('/tipo-lesao', [PacientController::class, 'tipoLesao']);
    Route::get('/tipo-tratamento', [PacientController::class, 'tipoTratamento']);
    Route::get('/comorbidade', [PacientController::class, 'comorbidade']);
});

require __DIR__.'/auth.php';
