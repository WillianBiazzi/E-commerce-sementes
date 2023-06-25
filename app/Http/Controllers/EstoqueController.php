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
        return view('estoque.index', ['estoques' => $estoques]);
    }

    public function create()
    {
        return view('estoque.create');
    }

    public function store(EstoqueRequest $request)
    {
        $data = $request->validated();

        $estoque = new Estoque();
        $estoque->Qtd = $data['qtd'];
        $estoque->save();

        return redirect()->route('estoques.create', $estoque->IdEstoque)
            ->with('success', 'Estoque criado com sucesso.');
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
    public function destroy($idEstoque)
    {
        $estoque = Estoque::findOrFail(Crypt::decrypt($idEstoque));
        $estoque->delete();

        return redirect()->route('estoques')->with('success', 'Estoque removido com sucesso.');
    }

}
