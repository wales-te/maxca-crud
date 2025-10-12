@extends('layouts.app')
@section('content')
<h1>Pedidos</h1>
<a href="{{ route('pedidos.create') }}">Nuevo</a>
<table>
<thead><tr><th>ID</th><th>Cliente</th><th>Email</th><th>Total (L)</th><th>Estado</th><th></th></tr></thead>
<tbody>
@foreach($pedidos as $p)
<tr>
  <td>{{ $p->id }}</td>
  <td>{{ $p->cliente_nombre }}</td>
  <td>{{ $p->cliente_email }}</td>
  <td>{{ number_format($p->total,2) }}</td>
  <td>{{ $p->estado }}</td>
  <td>
    <a href="{{ route('pedidos.edit',$p) }}">Editar</a>
    <form action="{{ route('pedidos.destroy',$p) }}" method="POST" style="display:inline">@csrf @method('DELETE')
      <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{ $pedidos->links() }}
@endsection
