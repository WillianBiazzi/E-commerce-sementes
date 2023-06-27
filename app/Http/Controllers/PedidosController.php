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
            $subQuery->where('nomeProduto', 'like', '%' . $filtragem . '%');
        });
    }

    $pedidos = $query->orderBy('idPedido')->paginate(5);
    return view('pedidos.index', compact('pedidos'));
}


    public function create(){
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_idCliente' => 'required',
            'produto_idProduto' => 'required',
            'qtdPedido' => 'required|numeric|min:1',
        ]);

        $produto = Produto::find($request->input('produto_idProduto'));
        $qtdPedido = $request->input('qtdPedido');
        $valorTotal = $produto->valor * $qtdPedido;

        $pedido = new Pedido();
        $pedido->cliente_idCliente = $request->input('cliente_idCliente');
        $pedido->produto_idProduto = $request->input('produto_idProduto');
        $pedido->qtdPedido = $qtdPedido;
        $pedido->valorTotal = $valorTotal;
        $pedido->save();

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function show($idPedido){
        $pedido = Pedido::findOrFail($idPedido);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit($idPedido){
        $pedido = Pedido::findOrFail($idPedido);
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
