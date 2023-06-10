@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main-content')
  <div class="row mt-4">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-md-8">
      <div class="row">
        <div class="col-6 d-flex align-items-end">
          <h4 class="text-info">Lista de profesores</h4>
        </div>
        <div class="col-6">
          <div class="d-flex justify-content-end">
            <a class="btn btn-success mb-2" href="{{ route('profesores.create', compact("profesores")) }}" data-bs-toggle="tooltip" data-bs-title="Agregar Profesor">
              <div class="d-flex justify-content-center align-items-center">
                <span class="material-icons">person_add</span>
              </div>
            </a>
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
                <th scope="col">Acciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($profesores as $index => $profesor)
                <tr>
                  <th scope="row">{{$index+1}}</th>
                  <td>{{$profesor->nombre}}</td>
                  <td>{{$profesor->apellido}}</td>
                  <td>
                    <div class="d-flex">
                      <form method="POST" action="{{route('profesores.destroy', $profesor)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar Profesor">
                          <div class="d-flex justify-content-center">
                            <span class="material-icons text-white">delete</span>
                          </div>
                        </button>
                      </form>
                    </div>
                  </td>
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
