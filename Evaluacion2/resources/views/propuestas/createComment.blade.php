@extends('templates.master')

@section('main-content')
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <form method="POST" class="p-4" action="{{route('propuestas.storeComment', $estudiante)}}">
        @method('POST')
        @csrf
        <h4>Nuevo Comentario</h4>
        <div class="mb-3">
          <select class="form-select" name="profesor" aria-label="Selecciona nombre para comentar">
            <option selected>Seleccione su nombre</option>
            @foreach($profesores as $profesor)
              <option value="{{$profesor->id}}">{{$profesor->nombre . ' ' . $profesor->apellido}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3 form-floating">
          <textarea class="form-control" placeholder="Escribe el comentario" name="comentario" id="comentario" style="height: 100px"></textarea>
          <label for="comentario">Ingresa la retroalimentación</label>
        </div>
        <div class="d-flex justify-content-end">
          <button type="reset" class="mx-2 btn btn-dark">Cancelar</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
    <div class="col-2"></div>
  </div>

@endsection
