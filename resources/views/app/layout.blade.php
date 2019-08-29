<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{URL('css/app.css')}}">
    <title>Renaware | @yield('title')</title>
  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">RENAWARE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('employee.index')}}">Empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('employee.create')}}">Crear empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('position.index')}}">Cargos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('position.create')}}">Crear cargo</a>
          </li>
        </ul>
      </div>
    </nav>
    <br>
    <div class="container" id="app">
      <div class="row">
        <div class="col align-self-center">
          <div class="card">
            <div class="card-header">
                <h2>RENAWARE</h2>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{URL('js/app.js')}}"></script>
  </body>
</html>
