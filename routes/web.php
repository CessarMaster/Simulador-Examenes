<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\AlumnoController;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home.index');

Route::get('/home', function () { return view('home');});

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

//Rutas del maestro
Route::get('/maestro', [MaestroController::class, 'index'])->middleware('auth.maestro')->name('maestro.index');
Route::get('/maestro/examenes', [MaestroController::class, 'show'])->name('maestro.examenes');
Route::get('/maestro/crear_examen', [MaestroController::class, 'crearExamen'])->name('maestro.crearExamen');
Route::post('/maestro/crear_examen', [MaestroController::class, 'guardarExamen'])->name('maestro.guardarExamen');
Route::post('/maestro/crear_examen/preguntas', [MaestroController::class, 'guardarPregunta'])->name('maestro.guardarPregunta');
Route::delete('maestro/{examen}', [MaestroController::class, 'destroy'])->name('maestro.destroy');
Route::get('/maestro/resultados', [MaestroController::class, 'resultados'])->name('maestro.resultados');

//Rutas del alumno
Route::get('/alumno', [AlumnoController::class, 'index'])->name('alumno.index');
Route::get('/alumno/examenes', [AlumnoController::class, 'show'])->name('alumno.examenes');
Route::get('/alumno/examen/{examen}', [AlumnoController::class, 'verExamen'])->name('alumno.verExamen');
Route::get('/alumno/resultados', [AlumnoController::class, 'examenTerminado'])->name('alumno.examenTerminado');
Route::get('/alumno/resultados/generales', [AlumnoController::class, 'resultados'])->name('alumno.resultados');
