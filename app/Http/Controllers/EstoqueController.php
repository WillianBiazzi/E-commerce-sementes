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
            $estoques = Estoque::with('produtos')->orderBy('idEstoque')->paginate(5);
        } else {
            $estoques = Estoque::with('produtos')
                ->where('idEstoque', 'like', '%' . $filtragem . '%')
                ->orderBy('idEstoque')
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
        $idEstoque = Crypt::decrypt($request->get('idEstoque'));
        $estoque = Estoque::find($idEstoque);
        $produtos = Produto::all();

        return view('estoques.edit', compact('estoque', 'produtos'));
    }

    public function update(EstoqueRequest $request, $idEstoque) {
        Estoque::find($idEstoque)->update($request->all());
        return redirect()->route('estoques');
    }

    public function destroy(Request $request) {
        try {
            Estoque::find(Crypt::decrypt($request->get('idEstoque')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return redirect()->route('estoques');
    }

}
