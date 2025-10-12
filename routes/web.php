<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoriaController, ProductoController, PedidoController};

Route::get('/', fn () => redirect()->route('productos.index'));

Route::resource('categorias', CategoriaController::class);
Route::resource('productos',  ProductoController::class);
Route::resource('pedidos',    PedidoController::class);
