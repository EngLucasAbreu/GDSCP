<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\PacientesController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/teste', [PacientController::class, 'create']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PacientController::class, 'dashboard'])->name('dashboard');
    Route::get('/pacientes/create', [PacientesController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes/store', [PacientesController::class, 'store'])->name('pacientes.store');
    Route::get('/evolucao', [PacientController::class, 'evolucao']);
    Route::get('/visualizar', [PacientController::class, 'visualizar']);
    Route::get('/evoluir', [PacientController::class, 'evoluir']);
    Route::get('/local-lesao', [PacientController::class, 'localLesao']);
    Route::get('/sala', [PacientController::class, 'sala']);
    Route::get('/leito', [PacientController::class, 'leito']);
    Route::get('/tipo-lesao', [PacientController::class, 'tipoLesao']);
    Route::get('/tipo-tratamento', [PacientController::class, 'tipoTratamento']);
});

require __DIR__.'/auth.php';
