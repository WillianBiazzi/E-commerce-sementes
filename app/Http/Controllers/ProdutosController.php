<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
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

    public function store(ProdutoRequest $request)
    {
        $novo_produto = $request->all();
        Produto::create($novo_produto);
        return redirect()->route('produtos.index');
    }

    public function destroy(Request $request)
    {
        try {
            Produto::find($request->get('id'))->delete();
            $ret = ['status' => 200, 'msg' => 'null'];
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = ['status' => 500, 'msg' => $e->getMessage()];
        } catch (\PDOException $e) {
            $ret = ['status' => 500, 'msg' => $e->getMessage()];
        }

        return $ret;
    }

    public function edit(Request $request)
    {
        $produto = Produto::find($request->get('id'));
        return view('produtos.edit', compact('produto'));
    }

    public function update(ProdutoRequest $request, $id)
    {
        Produto::find($id)->update($request->all());
        return redirect()->route('produtos.index');
    }
}
