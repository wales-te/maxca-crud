<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoriaController, ProductoController, PedidoController};
use App\Models\{Categoria, Producto, Pedido};

/*
|--------------------------------------------------------------------------
| Rutas de diagnóstico (para comprobar que el servidor y la base de datos funcionan)
|--------------------------------------------------------------------------
*/

Route::get('/health', function () {
    return 'OK';
});

Route::get('/categorias-json', function () {
    return Categoria::orderBy('id', 'desc')->get();
});

Route::get('/productos-json', function () {
    return Producto::orderBy('id', 'desc')->get();
});

Route::get('/pedidos-json', function () {
    return Pedido::orderBy('id', 'desc')->get();
});

/*
|--------------------------------------------------------------------------
| Rutas principales del CRUD
|--------------------------------------------------------------------------
*/

// Página inicial: redirige a productos
Route::get('/', fn () => redirect()->route('productos.index'));

// CRUD de cada entidad
Route::resource('categorias', CategoriaController::class);
Route::resource('productos',  ProductoController::class);
Route::resource('pedidos',    PedidoController::class);
