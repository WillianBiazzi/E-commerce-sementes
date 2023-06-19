<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ator;
use App\Http\Requests\AtorRequest;

class AtoresController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $filtro) {
        $filtragem = $filtro->get("desc_filtro");
        if($filtragem == null) {
            //$atores = Ator::orderBy('nome')->paginate(5);
            $atores = \DB::table('atores')
                            ->join('nacionalidades', 'atores.nacionalidade_id', '=', 'nacionalidades.id')
                            ->select('atores.*', 'nacionalidades.descricao')
                            ->orderBy('atores.nome')
                            ->paginate(5);
        } else {
            $atores = Ator::where('nome', 'like', '%'.$filtragem.'%')
                          ->orderBy('nome')
                          ->paginate(5)
                          ->setpath('atores?desc_filtro='.$filtragem);
        }
        return view('atores.index', ['atores' => $atores]);
    }

    public function create() {
        return view('atores.create');
    }

    public function store(AtorRequest $request) {
        $novo_ator = $request->all();
        Ator::create($novo_ator);
        return redirect()->route('atores');
    }

    public function destroy(Request $request) {
        try {
            Ator::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        return $ret;
        //return redirect()->route('atores');
    }

    public function edit(Request $request) {
        $ator = Ator::find(\Crypt::decrypt($request->get('id')));
        return view('atores.edit', compact('ator'));
    }

    public function update(AtorRequest $request, $id) {
        Ator::find($id)->update($request->all());
        return redirect()->route('atores');
    }

}
