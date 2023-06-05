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
Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores.index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/propuestas/{estudiante}', [PropuestasController::class, 'show'])->name('propuesta.show');
Route::get('/propuestas/{estudiante}/create', [PropuestasController::class, 'create'])->name('propuesta.create');
Route::get('/propuestas/descargar/{estudiante}', [PropuestasController::class, 'download'])->name('propuesta.download');
Route::post('/propuestas/{estudiante}/create', [PropuestasController::class, 'store'])->name('propuesta.store');
Route::delete('/propuestas/{propuesta}', [PropuestasController::class, 'destroy'])->name('propuesta.destroy');
