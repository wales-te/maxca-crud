@extends('layouts.app')
@section('content')
<h1>Nueva categoría</h1>
<form method="POST" action="{{ route('categorias.store') }}">@csrf
  <label>Nombre
    <input name="nombre" required>
  </label>
  <label>Descripción
    <textarea name="descripcion"></textarea>
  </label>
  <button>Guardar</button>
</form>
@endsection
