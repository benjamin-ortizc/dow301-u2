@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main-content')
  <div class="row mt-4">
    <div class="col-2"></div>
    <div class="col-8">
      <div class="row">
        <div class="col-6 d-flex align-items-end">
          <h4>Lista de profesores</h4>
        </div>
        <div class="col-6">
          <div class="d-flex justify-content-end">
            <a class="btn btn-success p-2 m-2" href="{{ route('profesores.create', compact("profesores")) }}">
              Crear nuevo profesor
            </a>
          </div>
        </div>
      </div>
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
                <a class="btn btn-success mx-2" href="{{route('estudiantes.index')}}">
                  <div class="d-flex justify-content-center">
                    <span class="material-icons">login</span>
                  </div>
                </a>

                <form method="POST" action="{{route('profesores.destroy', $profesor)}}">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger">
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
    <div class="col-2"></div>
  </div>
@endsection
