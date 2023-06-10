@extends('templates.master')

@section('main-content')
  <div class="d-flex justify-content-center align-items-center flex-column" style="height:80vh;">
    <h3 class="text-center text-info mb-0">
      Menu de Administrador
    </h3>
    <p class="mb-3 text-light">Que deseas hacer?</p>

    <a href="{{route('estudiantes.index')}}" class="btn btn-primary text-light mb-2">Ver Lista de Estudiantes</a>
    <a href="{{route('profesores.indexList')}}" class="btn btn-primary text-light mb-2">Ver Lista de Profesores</a>
  </div>
@endsection
