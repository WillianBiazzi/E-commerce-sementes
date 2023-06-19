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

    public function store(Request $request) {
        $pedido = Pedido::create([
            'DataPedido' => $request->input('dataPedido'),
            'fk_Clientes_IdCliente' => $request->input('fk_clientes_IdCliente')
        ]); 

        $produtos = $request->produtos;

        foreach ($produtos as $p => $produto) {
            PedidoProduto::create([
                'QtdPedido' => $produto['qtdPedido'],
                'fk_Produtos_IdProduto' => $produto['idProduto'],
                'fk_Pedidos_IdPedido' => $pedido->id
            ]);
        }

        return redirect()->route('pedidos');
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
