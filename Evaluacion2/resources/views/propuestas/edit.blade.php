@php
  $estados = [
      0 => 'Esperando revisión',
      1 => 'Modificar propuesta',
      2 => 'Rechazado',
      3 => 'Aprobado',
  ];
@endphp

@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="px-4">
      <h3 class="text-center text-info">
        Cambiar estado de la propuesta
      </h3>
      <p class="text-light">Seleccione el estado que desea cambiar a la propuesta</p>
      <div class="card mt-2 bg-primary">
        <div class="card-body">
          <form method="POST" action="{{ route('propuestas.update', $estudiante) }}">
            @method('PUT')
            @csrf
            <select name="estado" class="form-select mb-2">
              <option value="{{ $estudiante->propuestas()->get()->last()->estado }}" selected>{{$estados[$estudiante->propuestas()->get()->last()->estado]}}</option>
              @foreach($estados as $index => $estado)
                @if($index != $estudiante->propuestas()->get()->last()->estado)
                  <option value="{{$index}}">{{$estado}}</option>
                @endif
              @endforeach
            </select>
            <div class="text-center mt-2">
              <button type="submit" class="btn btn-secondary mt-2 px-2 text-light rounded-2">Cambiar estado</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
