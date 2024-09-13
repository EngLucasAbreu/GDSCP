<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\FerramentasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\LesoesController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PacientController::class, 'dashboard'])->name('dashboard');

    // PACIENTES
    Route::get('/pacientes/create', [PacientesController::class, 'create'])->name('pacientes.create');
    Route::get('/pacientes/edit/{paciente_id}', [PacientesController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/update/{paciente_id}', [PacientesController::class, 'update'])->name('pacientes.update');
    Route::post('/pacientes/store', [PacientesController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/pesquisar', [PacientesController::class, 'pesquisar'])->name('pacientes.pesquisar');
    Route::get('/pacientes/pesquisar-paciente', [PacientesController::class, 'pesquisarPaciente'])->name('pacientes.pesquisar-paciente');
    Route::get('/get-leitos/{id_setor}', [PacientesController::class, 'getLeitosBySetor']);


    // EVOLUÇÂO DE LESÕES
    Route::post('/lesoes/create-incidente', [LesoesController::class, 'create'])->name('create-evolucao-lesao');
    Route::post('/lesoes/store-novo-incidente/{paciente_id}/{leito_id}', [LesoesController::class, 'storeNovoIncidente'])->name('incidente.store');
    Route::post('/lesoes/alta-paciente/{paciente_id}', [LesoesController::class, 'liberarPaciente'])->name('liberar-paciente');
    Route::get('/lesoes/alta-paciente/{paciente_id}', [LesoesController::class, 'altaPaciente'])->name('alta-paciente');
    Route::get('/lesoes/read-lesao/{paciente_id}', [LesoesController::class, 'readLesao'])->name('read-evolucao-lesao');
    Route::get('/lesoes/registrar-incidente/{paciente_id}', [LesoesController::class, 'registrarNovoIncidente'])->name('registrar-novo-incidente');
    Route::get('/lesoes/read-lesao/{paciente_id}/{incidente_id}', [LesoesController::class, 'readIncidenteLesao'])->name('read-incidente-lesao');
    Route::get('/lesoes/read-all-lesoes', [LesoesController::class, 'readAllLesoes'])->name('read-all-evolucao-lesao');
    Route::put('/lesoes/update-lesao', [LesoesController::class, 'updateLesao'])->name('update-evolucao-lesao');
    Route::delete('/lesoes/delete-lesao', [LesoesController::class, 'deleteLesao'])->name('delete-evolucao-lesao');

    // SETORES
    Route::post('/ferramentas/create-setor', [FerramentasController::class, 'createSetor'])->name('create-setor');
    Route::get('/ferramentas/read-setor', [FerramentasController::class, 'readSetor'])->name('read-setor');
    Route::get('/ferramentas/read-all-setores', [FerramentasController::class, 'readAllSetores'])->name('setores.index');
    Route::put('/ferramentas/update-setor/{id}', [FerramentasController::class, 'updateSetor'])->name('update-setor');
    Route::delete('/ferramentas/delete-setor/{nome_setor}', [FerramentasController::class, 'deleteSetor'])->name('delete-setor');


    // LEITOS
    Route::post('/ferramentas/create-leito', [FerramentasController::class, 'createLeito'])->name('create-leito');
    Route::get('/ferramentas/read-leito', [FerramentasController::class, 'readLeito'])->name('read-leito');
    Route::get('/ferramentas/read-all-leitos', [FerramentasController::class, 'readAllLeitos'])->name('leitos.index');
    Route::put('/ferramentas/update-leito/{id}', [FerramentasController::class, 'updateLeito'])->name('update-leito');
    Route::delete('/ferramentas/delete-leito/{id}', [FerramentasController::class, 'deleteLeito'])->name('delete-leito');


    // COMORBIDADES
    Route::post('/ferramentas/create-comorbidade', [FerramentasController::class, 'createComorbidade'])->name('create-comorbidade');
    Route::get('/ferramentas/read-comorbidade', [FerramentasController::class, 'readComorbidade'])->name('read-comorbidade');
    Route::get('/ferramentas/read-all-comorbidades', [FerramentasController::class, 'readAllComorbidades'])->name('comorbidades.index');
    Route::put('/ferramentas/update-comorbidade/{id}', [FerramentasController::class, 'updateComorbidade'])->name('update-comorbidade');
    Route::delete('/ferramentas/delete-comorbidade/{id}', [FerramentasController::class, 'deleteComorbidade'])->name('delete-comorbidade');


    // LESÕES
    Route::post('/ferramentas/create-local-lesao', [FerramentasController::class, 'createLocalLesao'])->name('create-local-lesao');
    Route::post('/ferramentas/create-tipo-lesao', [FerramentasController::class, 'createTipoLesao'])->name('create-tipo-lesao');
    Route::get('/ferramentas/read-lesao', [FerramentasController::class, 'readLesao'])->name('read-lesao');
    Route::get('/ferramentas/read-all-local-lesao', [FerramentasController::class, 'readAllLocalLesoes'])->name('read-all-local-lesao');
    Route::get('/ferramentas/read-all-tipo-lesao', [FerramentasController::class, 'readAllTipoLesoes'])->name('read-all-tipo-lesao');
    Route::put('/ferramentas/update-local-lesao/{id}', [FerramentasController::class, 'updateLocalLesao'])->name('update-local-lesao');
    Route::put('/ferramentas/update-tipo-lesao/{id}', [FerramentasController::class, 'updateTipoLesao'])->name('update-tipo-lesao');
    Route::delete('/ferramentas/delete-local-lesao/{id}', [FerramentasController::class, 'deleteLocalLesao'])->name('delete-local-lesao');
    Route::delete('/ferramentas/delete-tipo-lesao/{id}', [FerramentasController::class, 'deleteTipoLesao'])->name('delete-tipo-lesao');


    // TRATAMENTOS
    Route::post('/ferramentas/create-tipo-tratamento', [FerramentasController::class, 'createTipoTratamento'])->name('create-tipo-tratamento');
    Route::get('/ferramentas/read-tratamento', [FerramentasController::class, 'readTratamento'])->name('read-tratamento');
    Route::get('/ferramentas/read-all-tipo-tratamentos', [FerramentasController::class, 'readAllTipoTratamentos'])->name('read-all-tipo-tratamento');
    Route::put('/ferramentas/update-tipo-tratamento/{id}', [FerramentasController::class, 'updateTratamento'])->name('update-tipo-tratamento');
    Route::delete('/ferramentas/delete-tratamento/{id}', [FerramentasController::class, 'deleteTratamento'])->name('delete-tipo-tratamento');

});

require __DIR__.'/auth.php';
