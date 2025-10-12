@extends('layouts.app')
@section('content')
<h1>Categorías</h1>
<a href="{{ route('categorias.create') }}">Nueva</a>
<table>
<thead><tr><th>ID</th><th>Nombre</th><th>Descripción</th><th></th></tr></thead>
<tbody>
@foreach($categorias as $c)
<tr>
  <td>{{ $c->id }}</td>
  <td>{{ $c->nombre }}</td>
  <td>{{ $c->descripcion }}</td>
  <td>
    <a href="{{ route('categorias.edit',$c) }}">Editar</a>
    <form action="{{ route('categorias.destroy',$c) }}" method="POST" style="display:inline">@csrf @method('DELETE')
      <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $categorias->links() }}
@endsection
