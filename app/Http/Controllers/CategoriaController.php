<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::orderByDesc('id')->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create() { return view('categorias.create'); }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => ['required','max:120','unique:categorias,nombre'],
            'descripcion' => ['nullable','string'],
        ]);
        Categoria::create($data);
        return redirect()->route('categorias.index')->with('ok','Categoría creada');
    }

    public function edit(Categoria $categoria) { return view('categorias.edit', compact('categoria')); }

    public function update(Request $request, Categoria $categoria) {
        $data = $request->validate([
            'nombre' => ['required','max:120','unique:categorias,nombre,'.$categoria->id],
            'descripcion' => ['nullable','string'],
        ]);
        $categoria->update($data);
        return redirect()->route('categorias.index')->with('ok','Categoría actualizada');
    }

    public function destroy(Categoria $categoria) {
        $categoria->delete();
        return back()->with('ok','Categoría eliminada');
    }
}
