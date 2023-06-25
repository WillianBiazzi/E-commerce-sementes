<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Estoque;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\ProdutoRequest;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $filtro)
    {
        $filtragem = $filtro->get("desc_filtro");
        if ($filtragem == null) {
            $produtos = Produto::orderBy('NomeProduto')->paginate(5);
        } else {
            $produtos = Produto::where('NomeProduto', 'like', '%' . $filtragem . '%')
                ->orderBy('NomeProduto')
                ->paginate(5)
                ->setPath('produtos?desc_filtro=' . $filtragem);
        }
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(ProdutoRequest $request) {
        $novo_produto = $request->all();
        Produto::create($novo_produto);
        return redirect()->route('produtos');
    }

    public function destroy(Request $request) {
        try {
            Produto::find(Crypt::decrypt($request->get('idProduto')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        return $ret;

    }

    public function edit(Request $request) {
        $idProduto = Crypt::decrypt($request->get('idProduto'));
        $produto = Produto::find($idProduto);
        $estoques = Estoque::all(); // Obtenha todos os estoques do banco de dados

        return view('produtos.edit', compact('produto', 'estoques'));
    }

    public function update(Request $request, $idProduto)
    {
        $produto = Produto::find($idProduto);
        $produto->NomeProduto = $request->input('nomeProduto');
        $produto->Descricao = $request->input('descricao');
        $produto->Preco = $request->input('preco');
        $produto->fk_Estoque_IdEstoque = $request->input('fk_Estoque_idEstoque');
        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');
    }
}
