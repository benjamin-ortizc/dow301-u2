@extends('templates.master')

@section('main-content')

  <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="px-4">
      <h3 class="text-center text-info">
        Nuevo Comentario
      </h3>
      <div class="card mt-2 bg-primary">
        <div class="card-body">
          <form method="POST" action="{{route('propuestas.storeComment', ['estudiante' => $estudiante, 'profesor' => $profesor])}}">
            @method('POST')
            @csrf
            <div class="mb-3 form-floating">
              <textarea class="form-control" placeholder="Escribe el comentario" name="comentario" id="comentario" style="width: 100%; height: 100px;"></textarea>
              <label for="comentario">Ingresa el mensaje</label>
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
