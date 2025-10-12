@extends('layouts.app')
@section('content')
<h1>Editar pedido #{{ $pedido->id }}</h1>
<form method="POST" action="{{ route('pedidos.update',$pedido) }}">@csrf @method('PUT')
  <label>Cliente <input name="cliente_nombre" value="{{ $pedido->cliente_nombre }}" required></label>
  <label>Email <input name="cliente_email" type="email" value="{{ $pedido->cliente_email }}"></label>
  <label>Total (L) <input name="total" type="number" step="0.01" min="0" value="{{ $pedido->total }}" required></label>
  <label>Estado
    <select name="estado" required>
      @foreach(['pendiente','pagado','enviado','cancelado'] as $e)
        <option value="{{ $e }}" {{ $pedido->estado===$e?'selected':'' }}>{{ $e }}</option>
      @endforeach
    </select>
  </label>
  <button>Actualizar</button>
</form>
@endsection
