@php

$estados = [
    0 => 'Esperando revisión',
    1 => 'Modificar propuesta',
    2 => 'Rechazado',
    3 => 'Aprobado',
];

$descripcionEstados = [
    1 => 'Debe presentar otra versión de la propuesta según como haya sido descrito en los comentarios',
    2 => 'Debe subir otra propuesta totalmente diferente',
];

$coloresEstados = [
    0 => "#FFFFFF",
    1 => "#FF6F00",
    2 => "#FF0000",
    3 => "#339900",
];

@endphp

@inject('carbon','Carbon\Carbon')

@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main-content')
  @if($estudiante->propuestas()->get() == "[]")
    <div class="d-flex flex-column align-items-center justify-content-center mt-4 " style="height: 80vh;">
      <h4 class="text-info">No tienes una propuesta de proyecto</h4>
      <a class="btn btn-secondary mt-2 px-2 text-light rounded-2" href="{{route('propuestas.create', $estudiante)}}">Crear nueva propuesta</a>
    </div>
  @endif

  @if($estudiante->propuestas()->get() != "[]")
    @if(
      $estudiante->propuestas()->get()->last()->estado != 0 and
      $estudiante->propuestas()->get()->last()->estado != 3
    )
      <div class="d-flex justify-content-end">
        <a class="btn btn-success text-white p-2 m-2" href="{{route('propuestas.create', $estudiante)}}">Crear nueva propuesta</a>
      </div>
    @else
      <div class="mt-5"></div>
    @endif

    <div class="row">
      <div class="col-0 col-md-3"></div>
      <div class="px-1 col-12 col-md-6">
        <h2 class="text-center text-info">Propuesta de {{$estudiante->nombre . ' ' . $estudiante->apellido}}</h2>
        <div class="card bg-primary mt-2 px-4 rounded-5">
{{--          <div class="card-header bg-secondary text-white text-center">--}}
{{--          </div>--}}
          <div class="card-body">
            <p>
              Archivo adjuntado de la propuesta:
              <a class="text-warning" href="{{route('propuestas.download', $estudiante->propuestas()->get()->last()->documento)}}">
                {{$estudiante->propuestas()->get()->last()->documento}}
              </a>
            </p>
            <p class="mb-0">
              Estado de la propuesta:
              <span class="fw-bold" style="color:{{ $coloresEstados[$estudiante->propuestas()->get()->last()->estado] }};">
                {{ $estados[$estudiante->propuestas()->get()->last()->estado] }}
              </span>
            </p>
            @if( !empty($descripcionEstados[$estudiante->propuestas()->get()->last()->estado])) <small class="text-muted">{{$descripcionEstados[$estudiante->propuestas()->get()->last()->estado]}}</small>@endif
            @if($estudiante->propuestas()->get()->last()->estado != 3)
              <form method="POST" action="{{ route('propuestas.destroy', $estudiante->propuestas()->get()->last()) }}">
                @method('delete')
                @csrf
                <div class="text-end">
                  <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar Propuesta">
                    <span class="material-icons text-light">delete</span>
                  </button>
                </div>
              </form>
            @endif
          </div>

        </div>
      </div>
      <div class="col-0 col-md-3"></div>
    </div>

    <div class="d-flex flex-column align-items-center mt-4 w-100">
        @foreach($profesores as $profesor)
          @foreach($profesor->propuestaPivot()->where('propuesta_id', $estudiante->propuestas()->get()->first()->id)->get() as $data)
          <div class="card mb-2 bg-secondary rounded-5">
              <div class="card-body bg-primary rounded-5">
                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3"
                       src="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" alt="avatar" width="60"
                       height="60" />
                  <div>
                    <h6 class="fw-bold text-light mb-1">{{$profesor->nombre . ' ' . $profesor->apellido}}</h6>
                    <p class="text-muted small mb-0">
                      Publicado el {{$carbon::parse($data->pivot->fecha)->format('d/m/Y')}} a las {{$data->pivot->hora}}
                    </p>
                    <p class="mt-2">
                      {{$data->pivot->comentario}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endforeach
    </div>
  @endif

@endsection

@section('script-extras')
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  </script>
@endsection
