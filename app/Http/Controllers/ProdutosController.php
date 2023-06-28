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
            $produto = Produto::orderBy('NomeProduto')->paginate(5);
        } else {
            $produto = Produto::where('NomeProduto', 'like', '%' . $filtragem . '%')
                ->orderBy('NomeProduto')
                ->paginate(5)
                ->setPath('produtos?desc_filtro=' . $filtragem);
        }
        return view('produtos.index', ['produtos' => $produto]);
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

        return redirect()->route('produtos');

    }

    public function edit(Request $request){
        $idProduto = Crypt::decrypt($request->get('idProduto'));
        $produto = Produto::find($idProduto);
        $produtos = Produto::all();

        return view('produtos.edit', compact('produto', 'produtos'));
    }

    public function update(ProdutoRequest $request, $idProduto) {
        Produto::find($idProduto)->update($request->all());
        return redirect()->route('produtos');
    }
}
