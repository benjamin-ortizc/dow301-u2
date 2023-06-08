@extends('templates.master')

@section('main-content')
  <div class="d-flex align-items-center justify-content-center">
    <div class="px-4">
      <div class="card mt-2">
        <div class="card-header bg-dark text-white text-center">
          <h5 class="card-title">Propuesta</h5>
        </div>
        <div class="card-body">
          <form method="POST" class="form" action="{{ route('propuestas.store', $estudiante) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="archivo" class="form-label">Ingresa tu archivo PDF para ser recibido por los profesores</label>
              <input class="form-control" name="archivo" type="file" id="archivo" accept="application/pdf">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
