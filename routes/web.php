<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\TestimonioController;



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
// Ruta para la página de inicio
// CORRECCIÓN: Se cambia 'index' por 'home' para que coincida con el método en el WebController
Route::get('/', [WebController::class, 'home'])->name('home');

// Rutas para Novedades
Route::get('/novedades', [NovedadController::class, 'index'])->name('novedades.index');
Route::get('/novedades/{slug}', [NovedadController::class, 'show'])->name('novedades.show');

// Rutas para Áreas de Práctica
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('/areas/{slug}', [AreaController::class, 'show'])->name('areas.show');

// Ruta para la página "Nosotros"
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');

// Ruta para la página de Sedes (actualmente estática)
Route::get('/sedes', function () {
    return view('web.sedes');
})->name('sedes');

// Ruta para la nueva página de Testimonios
Route::get('/testimonios', [TestimonioController::class, 'index'])->name('testimonios.index');

// Rutas para el formulario de contacto (NOMBRES ESTANDARIZADOS)
// Ruta GET para mostrar el formulario
Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
// Ruta POST para procesar el envío del formulario
Route::post('/contacto', [ContactController::class, 'sendEmail'])->name('contact.send');
// Ruta pública para ver todos los reconocimientos

