@extends('app.layout')

@section('title')
  Crear empleado
@endsection

@section('content')
  {{-- Se genera la vista a travez del componente VUE.JS en la carpeta /resource/js/components --}}
<position-list-component></position-list-component>
@endsection
