@extends('layouts.app')
@section('content')
<h1>Editar producto #{{ $producto->id }}</h1>
<form method="POST" action="{{ route('productos.update',$producto) }}">@csrf @method('PUT')
  <label>Categoría
    <select name="categoria_id" required>
      @foreach($categorias as $c)
        <option value="{{ $c->id }}" {{ $producto->categoria_id==$c->id?'selected':'' }}>{{ $c->nombre }}</option>
      @endforeach
    </select>
  </label>
  <label>Nombre <input name="nombre" value="{{ $producto->nombre }}" required></label>
  <label>SKU <input name="sku" value="{{ $producto->sku }}" required></label>
  <label>Precio (L) <input name="precio" type="number" step="0.01" min="0" value="{{ $producto->precio }}" required></label>
  <label>Stock <input name="stock" type="number" min="0" value="{{ $producto->stock }}" required></label>
  <button>Actualizar</button>
</form>
@endsection
