<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
  public function index() {
    $profesores = Profesor::all();
    return view('profesores.index', compact('profesores'));
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
    return redirect()->route('admin.showProfesores', compact('profesor'));
  }

  public function destroy(Profesor $profesor)
  {
    $profesor->delete();
    return redirect()->route('admin.showProfesores', compact('profesor'));
  }
}
