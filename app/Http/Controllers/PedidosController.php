<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoProduto;
use App\Produto;

class PedidosController extends Controller{
    public function index(Request $filtro)
{
    $filtragem = $filtro->get("desc_filtro");
    $query = Pedido::query()->with(['produtos']);

    if ($filtragem != null) {
        $query->whereHas('produtos', function ($subQuery) use ($filtragem) {
            $subQuery->where('NomeProduto', 'like', '%' . $filtragem . '%');
        });
    }

    $pedidos = $query->orderBy('IdPedido')->paginate(5);
    return view('pedidos.index', compact('pedidos'));
}


    public function create(){
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'produto_id' => 'required',
            'quantidade' => 'required|numeric|min:1',
        ]);

        $produto = Produto::find($request->input('produto_id'));
        $quantidade = $request->input('quantidade');
        $valorTotal = $produto->valor * $quantidade;

        $pedido = new Pedido();
        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->produto_id = $request->input('produto_id');
        $pedido->quantidade = $quantidade;
        $pedido->valor_total = $valorTotal;
        $pedido->save();

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function show($id){
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit($id){
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id){
        $pedido = Pedido::findOrFail($id);
        $pedido->valorTotal = $request->input('valorTotal');
        $pedido->cliente_id = $request->input('fk_cliente_docCliente');
        $pedido->vendedor_id = $request->input('fk_vendedor_docVendedor');
        $pedido->save();

        // Atualizar os itens do pedido aqui (caso necessário)

        return redirect()->route('pedidos.index');
    }

    public function destroy($id){
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        // Excluir os itens do pedido aqui (caso necessário)

        return redirect()->route('pedidos.index');
    }
}
