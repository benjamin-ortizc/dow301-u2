<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  @yield('style-ref')
  <title>Document</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TSI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('estudiante.index')}}">Estudiante</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('profesor.index')}}">Profesor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">Administrador</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    @yield('main-content')
  </div>

  @yield('script-ref')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  @yield('script-extras')
</body>
</html>
