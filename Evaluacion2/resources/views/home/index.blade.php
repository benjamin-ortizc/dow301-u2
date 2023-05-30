@extends('templates.master')

@section('style-ref')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <style>
    .button {
      padding: 8px;
      background: #173548;
      border: 1px solid #4a5568;
      border-radius: 12px;
      margin-bottom: 6px;
    }

    a {
      color: white;
      text-decoration: none;
    }
  </style>
@endsection

@section('main-content')
  <div class="d-flex justify-content-center align-items-center flex-column bg-dark" style="height:100vh;">
    <h1 class="text-center text-light">
      Inicio
    </h1>

    <a href="{{route('estudiante.index')}}" class="button">Acciones de estudiante</a>
    <a href="{{route('profesor.index')}}" class="button">Acciones de profesor</a>
    <a href="{{route('admin.index')}}" class="button">Acciones de administrador</a>
  </div>
@endsection
