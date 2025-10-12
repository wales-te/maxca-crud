@extends('layouts.app')
@section('content')
<h1>Nuevo pedido</h1>
<form method="POST" action="{{ route('pedidos.store') }}">@csrf
  <label>Cliente <input name="cliente_nombre" required></label>
  <label>Email <input name="cliente_email" type="email"></label>
  <label>Total (L) <input name="total" type="number" step="0.01" min="0" required></label>
  <label>Estado
    <select name="estado" required>
      <option value="pendiente">pendiente</option>
      <option value="pagado">pagado</option>
      <option value="enviado">enviado</option>
      <option value="cancelado">cancelado</option>
    </select>
  </label>
  <button>Guardar</button>
</form>
@endsection
