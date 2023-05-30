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
{{--  <nav>--}}
{{--    <a href="#">Inicio</a>--}}
{{--    <ul>--}}
{{--      <li>--}}
{{--        <a href="#">Estudiante</a>--}}
{{--      </li>--}}

{{--      <li>--}}
{{--        <a href="#">Profesor</a>--}}
{{--      </li>--}}

{{--      <li>--}}
{{--        <a href="#">Administrador</a>--}}
{{--      </li>--}}
{{--    </ul>--}}
{{--  </nav>--}}

  <div class="">
    @yield('main-content')
  </div>

  @yield('script-ref')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  @yield('script-extras')
</body>
</html>
