<?php

use App\Http\Controllers\TipoGasesController;
use App\Http\Controllers\ZonasController;
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

     ## ZONAS
     Route::get('/mantenimiento/zonas', function () {
        return view('mantenimiento.zonas.zonas');
    })->name('zonas');
     //AGREGAR
    Route::post('/mantenimiento/zonas', [ZonasController::class, 'store'])->name('zonas.store');
     // LISTAR
    Route::get('/zonas/list', [ZonasController::class, 'list'])->name('zonas.list');
     //ELIMINAR
    Route::delete('/zonas/{id}', [ZonasController::class, 'destroy'])->name('zonas.destroy');
     //EDITAR
    Route::put('/zonas/{id}', [ZonasController::class, 'update'])->name('zonas.update');
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
