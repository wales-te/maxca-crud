<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>MAXCA CRUD</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body class="container">
  <nav><ul>
    <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
    <li><a href="{{ route('productos.index') }}">Productos</a></li>
    <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
  </ul></nav>
  @if ($errors->any())
    <article style="color:#b00020">
      <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </article>
  @endif
  @if(session('ok')) <article style="color:green">{{ session('ok') }}</article> @endif
  @yield('content')
</body>
</html>
