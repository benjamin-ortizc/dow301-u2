@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="px-4">
      <h3 class="text-center text-info">
        Nueva Propuesta
      </h3>
      <div class="card mt-2 bg-primary">
        <div class="card-body">
          <form method="POST" class="form" action="{{ route('propuestas.store', $estudiante) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="archivo" class="form-label">Ingresa tu archivo PDF para ser recibido por los profesores</label>
              <input class="form-control bg-secondary" name="archivo" type="file" id="archivo" accept="application/pdf">
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
