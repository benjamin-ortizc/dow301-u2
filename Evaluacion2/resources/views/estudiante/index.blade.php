@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main-content')
  <div class="row mt-4">
    <div class="col-2"></div>
    <div class="col-8">
      <h4>Lista de estudiantes</h4>
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
              <a class="btn btn-primary">
                <span class="material-icons">visibility</span>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
@endsection
