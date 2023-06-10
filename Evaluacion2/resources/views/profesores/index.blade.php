@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="px-4">
      <h3 class="text-center text-info">
        Bienvenido Profesor
      </h3>
      <p class="text-light">Seleccione cual es su nombre para poder continuar</p>
      <div class="card mt-2 bg-primary">
        <div class="card-body">
          <form method="POST" action="{{ route('profesores.enter') }}">
            @method('POST')
            @csrf
            <select name="profesores" class="form-select bg-secondary">
              <option value="none" selected>Seleccione</option>
              @foreach($profesores as $profesor)
                <option value="{{$profesor->id}}">{{$profesor->nombre . ' ' . $profesor->apellido}}</option>
              @endforeach
            </select>
            <div class="text-center mt-2">
              <button type="submit" class="btn btn-secondary mt-2 px-2 text-light rounded-2">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
