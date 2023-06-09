@php

$estados = [
    0 => 'Esperando revisión',
    1 => 'Modificar propuesta',
    2 => 'Rechazado',
    3 => 'Aprobado',
];

$coloresEstados = [
    0 => "#616161",
    1 => "#FF6F00",
    2 => "#FF0000",
    3 => "#339900",
];

@endphp

@inject('carbon','Carbon\Carbon')

@extends('templates.master')

@section('main-content')
  @if($estudiante->propuestas()->get() == "[]")
    <div class="d-flex flex-column align-items-center mt-4">
      <h4>No tienes una propuesta de proyecto</h4>
      <a class="btn btn-success p-2 m-2" href="{{route('propuestas.create', $estudiante)}}">Crear nueva propuesta</a>
    </div>
  @endif

  @if($estudiante->propuestas()->get() != "[]")
    @if(
      $estudiante->propuestas()->get()->last()->estado != 0 and
      $estudiante->propuestas()->get()->last()->estado != 3
    )
      <div class="d-flex justify-content-end">
        <a class="btn btn-success p-2 m-2" href="{{route('propuestas.create', $estudiante)}}">Crear nueva propuesta</a>
      </div>
    @endif

    <div class="row">
      <div class="col-0 col-md-3"></div>
      <div class="px-4 col-12 col-md-6">
        <div class="card mt-2">
          <div class="card-header bg-dark text-white text-center">
            <h5 class="card-title">Propuesta</h5>
          </div>
          <div class="card-body">
            <p>
              Archivo adjuntado de la propuesta:
              <a href="{{route('propuestas.download', $estudiante->propuestas()->get()->last()->documento)}}">
                {{$estudiante->propuestas()->get()->last()->documento}}
              </a>
            </p>
            <p>
              Estado de la propuesta:
              <span class="fw-bold" style="color:{{ $coloresEstados[$estudiante->propuestas()->get()->last()->estado] }};">
                {{$estados[$estudiante->propuestas()->get()->last()->estado]}}
              </span>
            </p>
            @if($estudiante->propuestas()->get()->last()->estado != 3)
              <form method="POST" action="{{ route('propuestas.destroy', $estudiante->propuestas()->get()->last()) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">
                  <span class="material-icons">delete</span>
                </button>
              </form>
            @endif
          </div>

        </div>
      </div>
      <div class="col-0 col-md-3"></div>
    </div>

    <section class="m-0 p-0">
      <div class="container py-5">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12 col-lg-10 col-xl-8">
            <div class="card">
              <div class="card-body">
                @foreach($profesores as $profesor)
                  @if(count($profesor->propuestaPivot)>0 and $profesor->propuestaPivot[0]->estudiante_rut == $estudiante->rut)
                    <div class="d-flex flex-start align-items-center">
                      <img class="rounded-circle shadow-1-strong me-3"
                           src="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" alt="avatar" width="60"
                           height="60" />
                      <div>
                        <h6 class="fw-bold text-primary mb-1">{{$profesor->nombre . ' ' . $profesor->apellido}}</h6>
                        <p class="text-muted small mb-0">
                          Publicado el {{$carbon::parse($profesor->propuestaPivot[0]->pivot->fecha)->format('d/m/Y')}} a las {{$profesor->propuestaPivot[0]->pivot->hora}}
                        </p>
                        <form method="POST" action="{{route('propuestas.destroyComment', compact(['estudiante', 'profesor']) )}}">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger mx-2">
                            <div class="d-flex justify-content-center">
                              <span class="material-icons">delete</span>
                            </div>
                          </button>
                        </form>
                      </div>
                    </div>

                    <p class="mt-3 mb-4 pb-2">
                      {{$profesor->propuestaPivot[0]->pivot->comentario}}
                    </p>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </section>
  @endif

@endsection
