<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Propuesta;
use Illuminate\Support\Facades\Storage;

class PropuestasController extends Controller
{

  public function show(Estudiante $estudiante) {
    return view('estudiante.show', compact('estudiante'));
  }

  public function create(Estudiante $estudiante) {
    return view('propuestas.create', compact('estudiante'));
  }

  public function download($fileName) {
    return Storage::download('propuestas/' . $fileName);
  }

  public function store(Request $request, Estudiante $estudiante) {
    $propuesta = new Propuesta();
    $file = $request->file('archivo');

    $hashedName = $file->hashName();
    Storage::putFileAs(
      'propuestas', $request->file('archivo'), $hashedName
    );
    Storage::setVisibility($hashedName, 'public');

    $propuesta->fecha = Carbon::now();
    $propuesta->documento = $hashedName;
    $propuesta->estado = 0;
    $propuesta->estudiante_rut = $estudiante->rut;
    $propuesta->save();
    return redirect()->route('estudiante.show', $estudiante);
  }

  public function destroy(Propuesta $propuesta) {
    $propuesta->delete();
    return redirect()->route('estudiante.index');
  }
}
