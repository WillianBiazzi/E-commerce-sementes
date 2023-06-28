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
    $validatedData = $request->validate([
        'cliente_id' => 'required',
        'dataPedido' => 'required|date',
        'produtos' => 'required|array',
        'qtdPedido' => 'required|array',
        'valorTotal' => 'required|numeric',
    ]);

    $pedido = new Pedido();
    $pedido->idPedido = $this->generateUniquePedidoId(); // Implemente a lógica para gerar um ID único para o pedido
    $pedido->dataPedido = $validatedData['dataPedido'];
    $pedido->fk_Clientes_idCliente = $validatedData['cliente_id'];
    $pedido->save();

    $produtos = $validatedData['produtos'];
    $qtdPedidos = $validatedData['qtdPedido'];

    for ($i = 0; $i < count($produtos); $i++) {
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->fk_Produtos_idProduto = $produtos[$i];
        $pedidoProduto->fk_Pedidos_idPedido = $pedido->idPedido;
        $pedidoProduto->qtdPedido = $qtdPedidos[$i];
        $pedidoProduto->save();
    }

    return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
}

private function generateUniquePedidoId()
{
    // Implemente a lógica para gerar um ID único para o pedido, por exemplo, usando um timestamp ou um algoritmo personalizado
}


    public function show($idPedido){
        $pedido = Pedido::findOrFail($idPedido);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit($idPedido){
        $pedido = Pedido::findOrFail($idPedido);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $idPedido){
        $pedido = Pedido::findOrFail($idPedido);
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
