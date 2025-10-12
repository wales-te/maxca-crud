<?php

namespace App\Http\Controllers;

use App\Models\{Producto, Categoria};
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::with('categoria')->orderByDesc('id')->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create() {
    $categorias = \App\Models\Categoria::orderBy('nombre')->get();
    return view('productos.create', compact('categorias'));
}

public function store(\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'categoria_id' => ['required','exists:categorias,id'],
        'nombre'       => ['required','string','max:120'],
        'sku'          => ['required','string','max:60','unique:productos,sku'],
        'precio'       => ['required','numeric','min:0'],
        'stock'        => ['required','integer','min:0'],
    ]);
    \App\Models\Producto::create($data);
    return redirect()->route('productos.index')->with('ok','Producto creado');
}


    public function edit(Producto $producto) {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('productos.edit', compact('producto','categorias'));
    }

    public function update(Request $request, Producto $producto) {
        $data = $request->validate([
            'categoria_id' => ['required','exists:categorias,id'],
            'nombre'       => ['required','string','max:120'],
            'sku'          => ['required','string','max:60','unique:productos,sku,'.$producto->id],
            'precio'       => ['required','numeric','min:0'],
            'stock'        => ['required','integer','min:0'],
        ]);
        $producto->update($data);
        return redirect()->route('productos.index')->with('ok','Producto actualizado');
    }

    public function destroy(Producto $producto) {
        $producto->delete();
        return back()->with('ok','Producto eliminado');
    }
}
