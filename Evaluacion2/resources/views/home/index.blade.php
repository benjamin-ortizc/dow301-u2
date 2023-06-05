<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

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

  <title>Document</title>
</head>
<body>
  <main class="bg-dark">
    <div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;">
      <h1 class="text-center text-light">
        Inicio
      </h1>

      <a href="{{route('estudiantes.index')}}" class="button">Acciones de estudiante</a>
      <a href="{{route('profesores.index')}}" class="button">Acciones de profesor</a>
      <a href="{{route('admin.index')}}" class="button">Acciones de administrador</a>
    </div>
  </main>
</body>
</html>
