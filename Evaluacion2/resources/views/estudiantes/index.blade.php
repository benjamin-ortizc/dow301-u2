@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main-content')
  @if(!empty($profesor))
    <h4 class="mt-2 text-center">Bienvenido <span class="text-warning">{{$profesor->nombre . ' ' . $profesor->apellido}}</span>!</h4>
    <p class="text-center">Interactua con las opciones del estudiante</p>
    <hr>
  @endif

  <div class="row mt-2">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-lg-8">
      <div class="row">
        <div class="col-6 d-flex align-items-end">
          <h4 class="text-info">Lista de estudiantes</h4>
        </div>
        <div class="col-6">
          <div class="d-flex justify-content-end">

            @if(empty($profesor))
              <a class="btn btn-success mb-2" href="{{ route('estudiantes.create', compact("estudiantes")) }}" data-bs-toggle="tooltip" data-bs-title="Agregar Estudiante">
                <div class="d-flex justify-content-center align-items-center">
                  <span class="material-icons">person_add</span>
                </div>
              </a>
            @endif

          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-dark">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                @if(empty($profesor))
                  <th scope="col">Acciones Usuario</th>
                @endif
                @if(!empty($profesor))
                  <th scope="col">Acciones Propuesta</th>
                @endif
              </tr>
              </thead>
              <tbody>
              @foreach($estudiantes as $index => $estudiante)
                <tr>
                  <th scope="row">{{$index+1}}</th>
                  <td>{{$estudiante->nombre}}</td>
                  <td>{{$estudiante->apellido}}</td>
                  @if(empty($profesor))
                    <td>
                      <form method="POST" action="{{route('estudiantes.destroy', $estudiante)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger mx-2" data-bs-toggle="tooltip" data-bs-title="Borrar Estudiante">
                          <div class="d-flex justify-content-center">
                            <span class="material-icons text-white">delete</span>
                          </div>
                        </button>
                      </form>
                    </td>
                  @else
                    <td>
                      <div class="d-flex">
                        <a class="btn btn-primary mx-2" href="{{route('propuestas.show', $estudiante)}}" data-bs-toggle="tooltip" data-bs-title="Ver Propuesta">
                          <div class="d-flex justify-content-center">
                            <span class="material-icons">visibility</span>
                          </div>
                        </a>

                        <a class="btn btn-success mx-2" href="{{route('propuestas.createComment', ['estudiante' => $estudiante, 'profesor' => $profesor])}}" data-bs-toggle="tooltip" data-bs-title="Añadir Comentario">
                          <div class="d-flex justify-content-center">
                            <span class="material-icons text-white">add_comment</span>
                          </div>
                        </a>

                        <form method="POST" action="{{route('propuestas.destroyComment', ['estudiante' => $estudiante, 'profesor' => $profesor])}}">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger mx-2" data-bs-toggle="tooltip" data-bs-title="Borrar Comentario">
                            <div class="d-flex justify-content-center">
                              <span class="material-icons text-white">comments_disabled</span>
                            </div>
                          </button>
                        </form>

                        <a class="btn btn-warning mx-2" href="{{route('propuestas.edit', $estudiante)}}" data-bs-toggle="tooltip" data-bs-title="Modificar Estado">
                          <div class="d-flex justify-content-center">
                            <span class="material-icons">settings</span>
                          </div>
                        </a>
                      </div>
                    </td>
                  @endif
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-0 col-md-2"></div>
  </div>
@endsection

@section('script-extras')
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  </script>
@endsection
