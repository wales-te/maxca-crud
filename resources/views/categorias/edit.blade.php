@extends('layouts.app')
@section('content')
<h1>Editar categoría #{{ $categoria->id }}</h1>
<form method="POST" action="{{ route('categorias.update',$categoria) }}">@csrf @method('PUT')
  <label>Nombre <input name="nombre" value="{{ $categoria->nombre }}" required></label>
  <label>Descripción <textarea name="descripcion">{{ $categoria->descripcion }}</textarea></label>
  <button>Actualizar</button>
</form>
@endsection
