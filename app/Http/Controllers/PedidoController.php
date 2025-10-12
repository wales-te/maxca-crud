<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index() {
        $pedidos = Pedido::orderByDesc('id')->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create() { return view('pedidos.create'); }

    public function store(Request $request) {
        $data = $request->validate([
            'cliente_nombre' => ['required','max:120'],
            'cliente_email'  => ['nullable','email'],
            'total'          => ['required','numeric','min:0'],
            'estado'         => ['required','in:pendiente,pagado,enviado,cancelado'],
        ]);
        Pedido::create($data);
        return redirect()->route('pedidos.index')->with('ok','Pedido creado');
    }

    public function edit(Pedido $pedido) { return view('pedidos.edit', compact('pedido')); }

    public function update(Request $request, Pedido $pedido) {
        $data = $request->validate([
            'cliente_nombre' => ['required','max:120'],
            'cliente_email'  => ['nullable','email'],
            'total'          => ['required','numeric','min:0'],
            'estado'         => ['required','in:pendiente,pagado,enviado,cancelado'],
        ]);
        $pedido->update($data);
        return redirect()->route('pedidos.index')->with('ok','Pedido actualizado');
    }

    public function destroy(Pedido $pedido) {
        $pedido->delete();
        return back()->with('ok','Pedido eliminado');
    }
}
