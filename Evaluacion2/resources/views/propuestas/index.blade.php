@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center">
    <div class="px-4">
      <div class="card mt-2">
        <div class="card-header bg-dark text-white text-center">
          <h5 class="card-title">Crear/Ver Propuestas</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('propuestas.enter') }}">
            @method('POST')
            @csrf

            <select name="estudiantes" class="form-select">
              <option value="none" selected>Selecciona tu nombre</option>
              @foreach($estudiantes as $index => $estudiante)
                <option value="{{$estudiante->rut}}">{{$estudiante->nombre . ' ' . $estudiante->apellido}}</option>
              @endforeach
            </select>

            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
