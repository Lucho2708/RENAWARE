@extends('app.layout')

@section('title')
  Empleados
@endsection

@section('content')
<h5 class="card-tite">Empleados</h5>
<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nombres</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Salario</th>
      <th>Acción</th>
    </tr>
  </thead>
</table>
@endsection
