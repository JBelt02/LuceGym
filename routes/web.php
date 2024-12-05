<?php

use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EntrenadoresController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ContactFormController;

// Ruta para la página principal (dashboard)
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Ruta para la vista de servicios
Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

// Rutas para el CRUD de horarios
Route::middleware('auth')->group(function () {
    Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
    Route::get('/horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
    Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
    Route::get('/horarios/{horario}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');
    Route::put('/horarios/{horario}', [HorarioController::class, 'update'])->name('horarios.update');
    Route::delete('/horarios/{horario}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
});

// Rutas para el CRUD de Reservas
Route::middleware('auth')->group(function () {
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});


//Rutas para el CRUD de Entrenadores
Route::middleware('auth')->group(function () {
    Route::get('/entrenadores', [EntrenadoresController::class, 'index'])->name('entrenadores.index');
    Route::get('/entrenadores/create', [EntrenadoresController::class, 'create'])->name('entrenadores.create');
    Route::post('/entrenadores', [EntrenadoresController::class, 'store'])->name('entrenadores.store');
    Route::get('/entrenadores/{entrenador}/edit', [EntrenadoresController::class, 'edit'])->name('entrenadores.edit');
    Route::put('/entrenadores/{entrenador}', [EntrenadoresController::class, 'update'])->name('entrenadores.update');
    Route::delete('/entrenadores/{entrenador}', [EntrenadoresController::class, 'destroy'])->name('entrenadores.destroy');
});


Route::resource('usuarios', UsuariosController::class)->middleware('auth');


// Rutas para el CRUD de Clases
Route::middleware('auth')->group(function () {
    Route::get('/clases', [ClasesController::class, 'index'])->name('clases.index');
    Route::get('/clases/create', [ClasesController::class, 'create'])->name('clases.create');
    Route::post('/clases', [ClasesController::class, 'store'])->name('clases.store');
    Route::get('/clases/{clase}/edit', [ClasesController::class, 'edit'])->name('clases.edit');
    Route::put('/clases/{clase}', [ClasesController::class, 'update'])->name('clases.update');
    Route::delete('/clases/{clase}', [ClasesController::class, 'destroy'])->name('clases.destroy');
});


// Rutas protegidas para el perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::post('/contact/send', [ContactFormController::class, 'send'])->name('contact.send');


// Autenticación
require __DIR__.'/auth.php';