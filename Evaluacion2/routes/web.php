<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropuestasController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::post('/estudiantes/create', [EstudianteController::class, 'store'])->name('estudiantes.store');

Route::get('/estudiantes/propuestas', [PropuestasController::class, 'index'])->name('propuestas.index');
Route::get('/estudiantes/propuestas/{estudiante}', [PropuestasController::class, 'show'])->name('propuestas.show');
Route::get('/estudiantes/propuestas/{estudiante}/create', [PropuestasController::class, 'create'])->name('propuestas.create');
Route::get('/estudiantes/propuestas/descargar/{estudiante}', [PropuestasController::class, 'download'])->name('propuestas.download');
Route::post('/estudiantes/propuestas/{estudiante}/create', [PropuestasController::class, 'store'])->name('propuestas.store');
Route::post('/estudiantes/propuestas', [PropuestasController::class, 'enter'])->name('propuestas.enter');
Route::get('/estudiantes/propuestas/{estudiante}/createComment', [PropuestasController::class, 'createComment'])->name('propuestas.createComment');
Route::post('/estudiantes/propuestas/{estudiante}/createComment', [PropuestasController::class, 'storeComment'])->name('propuestas.storeComment');
Route::delete('/estudiantes/propuestas/{estudiante}/deleteComment/{profesor}', [PropuestasController::class, 'destroyComment'])->name('propuestas.destroyComment');
Route::delete('/estudiantes/propuestas/{propuesta}', [PropuestasController::class, 'destroy'])->name('propuestas.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/estudiantes/create',[EstudianteController::class, 'create'])->name('estudiantes.create');

Route::get('/profesores/', [ProfesorController::class, 'index'])->name('profesores.index');
Route::get('/profesores/{profesor}', [ProfesorController::class, 'show'])->name('profesores.show');
Route::get('/profesores/create', [ProfesorController::class, 'create'])->name('profesores.create');
Route::post('/profesores/create', [ProfesorController::class, 'store'])->name('profesores.store');
Route::delete('/profesores/{profesor}', [ProfesorController::class, 'destroy'])->name('profesores.destroy');

