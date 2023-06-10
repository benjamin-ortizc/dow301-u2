<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
  public function indexList() {
    $profesores = Profesor::all();
    return view('profesores.indexList', compact('profesores'));
  }

  public function index() {
    $profesores = Profesor::all();
    return view('profesores.index', compact('profesores'));
  }

  public function enter(Request $req)
  {
    $profesor = Profesor::find($req->profesores);
    return redirect()->route('profesores.estudiantes.show', $profesor);
  }

  public function showEstudiantes(Profesor $profesor)
  {
    $estudiantes = Estudiante::all();
    return view('estudiantes.index', compact([
      'estudiantes',
      'profesor',
    ]));
  }

  public function create()
  {
    return view('profesores.create');
  }

  public function store(Request $request, Profesor $profesor)
  {
    $profesor = new Profesor();
    $profesor->nombre = $request->nombre;
    $profesor->apellido = $request->apellido;
    $profesor->email = $request->email;
    $profesor->save();
    return redirect()->route('profesores.indexList', compact('profesor'));
  }

  public function destroy(Profesor $profesor)
  {
    $profesor->delete();
    return redirect()->route('profesores.indexList', compact('profesor'));
  }
}
