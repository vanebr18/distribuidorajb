<?php

use App\Http\Controllers\TipoGasesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    ## TIPOS DE GASES
    Route::get('/mantenimiento/tipo-gas', function () {
        return view('mantenimiento.tipo-gas.tipo-gases');
    })->name('tipo-gases');
     //AGREGAR
    Route::post('/mantenimiento/tipo-gases', [TipoGasesController::class, 'store'])->name('tipogases.store');
     // LISTAR
    Route::get('/tipogases/list', [TipoGasesController::class, 'list'])->name('tipogases.list');
     //ELIMINAR
    Route::delete('/tipogases/{id}', [TipoGasesController::class, 'destroy'])->name('tipogases.destroy');
     //EDITAR
    Route::put('/tipogases/{id}', [TipoGasesController::class, 'update'])->name('tipogases.update');
});



//TERMINOS Y POLÍTICAS
Route::get('/terms', function () {
    $terms = '
        <h1>Términos y Condiciones</h1>
        <p>Bienvenido a nuestra plataforma. Aquí van tus términos de uso...</p>
    ';

    return view('terms', compact('terms'));
})->name('terms.show');

Route::get('/privacy', function () {
    $policy = '
        <h1>Políticas de Privacidad</h1>
        <p>Aquí describimos cómo manejamos la información de los usuarios...</p>
    ';

    return view('policy', compact('policy'));
})->name('policy.show');
