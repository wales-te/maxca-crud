@extends('layouts.app')
@section('content')
<h1>Nuevo producto</h1>

<form method="POST" action="{{ route('productos.store') }}"> @csrf
  <label>Categoría
    <select name="categoria_id" required>
      <option value="">--</option>
      @foreach($categorias as $c)
        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
      @endforeach
    </select>
  </label>

  <label>Nombre
    <input name="nombre" required>
  </label>

  <label>SKU
    <input name="sku" required>
  </label>

  <label>Precio (L)
    <input name="precio" type="number" step="0.01" min="0" required>
  </label>

  <label>Stock
    <input name="stock" type="number" min="0" required>
  </label>

  <button>Guardar</button>
</form>
@endsection
