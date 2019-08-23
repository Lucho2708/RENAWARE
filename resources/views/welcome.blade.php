@extends('app.layout')

@section('title')
  Empleados
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col align-self-center">
        <div class="card">
          <div class="card-header">
              <h2>RENAWARE</h2>
          </div>
          <div class="card-body">
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
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
