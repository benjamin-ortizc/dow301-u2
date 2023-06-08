@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center">
    <div class="px-4">
      <div class="card mt-2">
        <div class="card-header bg-dark text-white text-center">
          <h5 class="card-title">Nuevo profesor</h5>
        </div>
        <div class="card-body">
          <form method="POST" class="form" action="{{ route('profesores.store') }}">
            @method('POST')
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Pedro">
            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Sánchez">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com">
            </div>

            <button type="reset" class="btn btn-light">Cancelar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
