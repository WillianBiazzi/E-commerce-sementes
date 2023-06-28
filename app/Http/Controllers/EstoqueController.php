<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Http\Requests\EstoqueRequest;
use App\Produto;
use Illuminate\Support\Facades\Crypt;

class EstoqueController extends Controller
{

    public function index(Request $filtro)
    {
        $filtragem = $filtro->get("desc_filtro");
        if ($filtragem == null) {
            $estoques = Estoque::with('produtos')->orderBy('IdEstoque')->paginate(5);
        } else {
            $estoques = Estoque::with('produtos')
                ->where('IdEstoque', 'like', '%' . $filtragem . '%')
                ->orderBy('IdEstoque')
                ->paginate(5)
                ->setPath('estoques?desc_filtro=' . $filtragem);
        }
        return view('estoques.index', ['estoques' => $estoques]);
    }

    public function create()
    {
        return view('estoques.create');
    }

    public function store(EstoqueRequest $request) {
        $novo_estoque = $request->all();
        Estoque::create($novo_estoque);
        return redirect()->route('estoques');
    }

    public function edit(Request $request) {
        $IdEstoque = Crypt::decrypt($request->get('IdEstoque'));
        $estoque = Estoque::find($IdEstoque);
        $produtos = Produto::all();

        return view('estoques.edit', compact('estoque', 'produtos'));
    }

    public function update(EstoqueRequest $request, $IdEstoque) {
        Estoque::find($IdEstoque)->update($request->all());
        return redirect()->route('estoques');
    }

    public function destroy(Request $request) {
        try {
            Estoque::find(Crypt::decrypt($request->get('IdEstoque')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return redirect()->route('estoques');
    }

}
