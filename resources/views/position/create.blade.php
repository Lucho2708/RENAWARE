@extends('app.layout')

@section('title')
  Crear empleado
@endsection

@section('content')
<h5 class="card-tite">Crear cargo</h5>
<br>
<form  action="{{route('position.store')}}" method="post" >
  @csrf
  <div class="form-group">
    <label for="cargo">Cargo:</label>
    <input type="text" class="form-control" id="cargo" name="cargo">
  </div>
  <div class="form-group">
    <label for="salario">Salario:</label>
    <input type="number" class="form-control" id="salario" name="salario" >
  </div>
  <div class="form-group">
    <label for="impuesto">Impuesto:</label>
    <input type="number" class="form-control" id="impuesto" name="impuesto" step=0.01>
  </div>
  <div class="form-group">
    <label for="salud">Salud:</label>
    <input type="number" class="form-control" id="salud" name="salud" step=0.01>
  </div>
  <div class="form-group">
    <label for="pension">Pension:</label>
    <input type="number" class="form-control" id="pension" name="pension" step=0.01>
  </div>
  <div class="form-group">
    <label for="valor_primas">Valor prima:</label>
    <input type="number" class="form-control" id="valor_primas" name="valor_primas" step=0.01>
  </div>
  <button type="submit" class="btn btn-success">Crear</button>
</form>
@endsection
