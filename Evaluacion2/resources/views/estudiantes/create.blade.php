@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="px-6 mt-4">
      <h3 class="text-center text-info">
        Nuevo Estudiante
      </h3>
      <div class="card mt-2 bg-primary">
        <div class="card-body">
          <form method="POST" class="form" action="{{ route('estudiantes.store') }}">
            @method('POST')
            @csrf
            <div class="mb-3">
              <label for="rut" class="form-label">RUT</label>
              <input type="text" class="form-control bg-secondary" name="rut" id="rut" placeholder="12345678-9">
            </div>

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control bg-secondary" name="nombre" id="nombre" placeholder="Pedro">
            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" class="form-control bg-secondary" name="apellido" id="apellido" placeholder="Sánchez">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control bg-secondary" name="email" id="email" placeholder="nombre@ejemplo.com">
            </div>

            <div class="d-flex justify-content-between">
              <button type="reset" class="btn btn-info text-white">Cancelar</button>
              <button type="submit" class="btn btn-success text-white">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
