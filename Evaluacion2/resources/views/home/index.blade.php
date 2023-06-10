<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">

  <title>Document</title>
</head>
<body>
  <main class="bg-dark">
    <div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;">
      <h1 class="text-center text-info">
        Bienvenido!
      </h1>

      <a href="{{route('propuestas.index')}}" class="btn btn-primary text-light mb-2">Acciones de estudiante</a>
      <a href="{{route('profesores.index')}}" class="btn btn-primary text-light mb-2">Acciones de profesor</a>
      <a href="{{route('admin.index')}}" class="btn btn-primary text-light mb-2">Acciones de administrador</a>
    </div>
  </main>
</body>
</html>
