@extends('app.layout')

@section('title')
  Crear empleado
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
            <h5 class="card-tite">Crear empleado</h5>
            <br>
            <form  action="{{route('employee.store')}}" method="post" >
              <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres">
              </div>
              <div class="form-group">
                <label for="documento">Documento:</label>
                <input type="number" class="form-control" id="documento" name="documento">
              </div>
              <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" id="telefono" name="telefono">
              </div>
              <div class="form-group">
                <label for="direccion">Documento:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
              </div>
              <div class="form-group">
                <label for="cargo"></label>
                <select class="form-control" id="cargo" name="cargo">
                  <option disabled selected>Seleccionar:</option>
                  <option value="">Tecnico</option>
                  <option value="">Gerente</option>
                </select>
              </div>
              <button type="submit" name="button" class="btn btn-success">Crear</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
