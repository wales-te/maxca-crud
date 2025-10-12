@extends('layouts.app')
@section('content')
<h1>Productos</h1>
<a href="{{ route('productos.create') }}">Nuevo</a>
<table>
  <thead><tr><th>ID</th><th>Nombre</th><th>SKU</th><th>Precio (L)</th><th>Stock</th><th>Categoría</th><th></th></tr></thead>
  <tbody>
  @foreach($productos as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->nombre }}</td>
      <td>{{ $p->sku }}</td>
      <td>{{ number_format($p->precio,2) }}</td>
      <td>{{ $p->stock }}</td>
      <td>{{ $p->categoria->nombre ?? '-' }}</td>
      <td>
        <a href="{{ route('productos.edit',$p) }}">Editar</a>
        <form action="{{ route('productos.destroy',$p) }}" method="POST" style="display:inline">
          @csrf @method('DELETE')
          <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $productos->links() }}
@endsection
