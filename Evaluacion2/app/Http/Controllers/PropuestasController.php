<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Propuesta;
use Illuminate\Support\Facades\Storage;

class PropuestasController extends Controller
{
  public function enter(Request $req) {
    $estudiante = Estudiante::find($req->estudiantes);
    return redirect()->route('propuestas.show', $estudiante);
  }

  public function index() {
    $estudiantes = Estudiante::all();
    return view('propuestas.index', compact('estudiantes'));
  }

  public function show(Estudiante $estudiante) {
    $profesores = Profesor::all();
    $propuestas = Propuesta::where('estudiante_rut', $estudiante->rut)->get();
//    dd($propuestas);
    return view('propuestas.show', compact([
      'estudiante',
      'profesores',
      'propuestas'
    ]));
  }

  public function create(Estudiante $estudiante) {
    return view('propuestas.create', compact('estudiante'));
  }

  public function edit(Estudiante $estudiante)
  {
    return view('propuestas.edit', compact('estudiante'));
  }

  public function update(Request $req, Estudiante $estudiante)
  {
    $propuesta = $estudiante->propuestas()->get()->last();
    $propuesta->estado = $req->estado;
    $propuesta->save();
    return redirect()->route('propuestas.show', compact('estudiante'));
  }

  public function createComment(Estudiante $estudiante, Profesor $profesor)
  {
    return view('propuestas.createComment', compact
      ([
        'estudiante',
        'profesor'
      ])
    );
  }

  public function storeComment(Request $request, Estudiante $estudiante) {
    $profesor = Profesor::find($request->profesor);
    $propuesta = $estudiante->propuestas()->get()->last();

    $profesor_id = $request->profesor;
    $propuesta_id = $propuesta->id;

    $profesor->propuestas()->attach($propuesta_id,
      [
        'fecha'      => Carbon::now()->toDateString(),
        'hora'       => Carbon::now()->toTimeString(),
        'comentario' => $request->comentario
      ]
    );

    return redirect()->route('propuestas.show', $estudiante);
  }

  public function destroyComment(Estudiante $estudiante, Profesor $profesor) {
    $propuesta = Propuesta::where('estudiante_rut', $estudiante->rut)->first();
    $propuesta->profesores()->detach($profesor->id);
    return redirect()->route('propuestas.show', $estudiante);
  }

  public function download($fileName) {
    return Storage::download('propuestas/' . $fileName);
  }

  public function store(Request $request, Estudiante $estudiante) {
    $propuesta = new Propuesta();
    $file = $request->file('archivo');

    $fileName = $file->getClientOriginalName();
    Storage::putFileAs(
      'propuestas', $file, $fileName
    );

    Storage::setVisibility($fileName, 'public');

    $propuesta->fecha = Carbon::now();
    $propuesta->documento = $fileName;
    $propuesta->estado = 0;
    $propuesta->estudiante_rut = $estudiante->rut;
    $propuesta->save();
    return redirect()->route('propuestas.show', $estudiante);
  }

  public function destroy(Propuesta $propuesta) {
    $propuesta->delete();
    return redirect()->route('estudiantes.index');
  }
}
