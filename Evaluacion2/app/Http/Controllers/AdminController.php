<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index() {
    return view('admin.index');
  }

  public function showEstudiantes() {
    $estudiantes = Estudiante::all();
    return view('admin.showEstudiantes', compact('estudiantes'));
  }

  public function showProfesores() {
    $profesores = Profesor::all();
    return view('admin.showProfesores', compact('profesores'));
  }
}
