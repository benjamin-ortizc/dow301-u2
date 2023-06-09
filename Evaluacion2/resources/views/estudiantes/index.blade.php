@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main-content')
  <div class="row mt-4">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-lg-8">
      <div class="row">
        <div class="col-6 d-flex align-items-end">
          <h4>Lista de estudiantes</h4>
        </div>
        <div class="col-6">
          <div class="d-flex justify-content-end">
            <a class="btn btn-success p-2 m-2" href="{{ route('estudiantes.create', compact("estudiantes")) }}">
              Crear nuevo estudiante</a>
          </div>
        </div>
      </div>
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
          @foreach($estudiantes as $index => $estudiante)
            <tr>
              <th scope="row">{{$index+1}}</th>
              <td>{{$estudiante->nombre}}</td>
              <td>{{$estudiante->apellido}}</td>
              <td>
                <div class="d-flex">
                  <a class="btn btn-primary mx-2" href="{{route('propuestas.show', $estudiante)}}">
                    <div class="d-flex justify-content-center">
                      <span class="material-icons">visibility</span>
                    </div>
                  </a>

                  <a class="btn btn-secondary mx-2" href="{{route('propuestas.createComment', $estudiante)}}">
                    <div class="d-flex justify-content-center">
                      <span class="material-icons">add_comment</span>
                    </div>
                  </a>

                  <form method="POST" action="{{route('estudiantes.destroy', $estudiante)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mx-2">
                      <div class="d-flex justify-content-center">
                        <span class="material-icons">delete</span>
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
    <div class="col-0 col-md-2"></div>
  </div>
@endsection
