<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
  public function index()
  {
    $estudiantes = Estudiante::all();
    return view('estudiantes.index', compact("estudiantes"));
  }

  public function destroy(Estudiante $estudiante)
  {
    $estudiante->delete();
    return redirect()->route('admin.showEstudiantes', compact('estudiante'));
  }

  public function create()
  {
    return view('estudiantes.create');
  }

  public function store(Request $request, Estudiante $estudiantes)
  {
    $estudiante = new Estudiante();
    $estudiante->rut = $request->rut;
    $estudiante->nombre = $request->nombre;
    $estudiante->apellido = $request->apellido;
    $estudiante->email = $request->email;
    $estudiante->save();
    return redirect()->route('admin.showEstudiantes', compact('estudiantes'));
  }
}
