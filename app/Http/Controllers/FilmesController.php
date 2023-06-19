<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;
use App\FilmeAtor;

class FilmesController extends Controller
{
    public function index() {
        $filmes = Filme::all();
        return view('filmes.index', ['filmes' => $filmes]);
    }

    public function create() {
        return view('filmes.create');
    }

    public function store(Request $request) {
        /* Trecho de código se o objetivo é aceitar filmes SEM atores */
        /*
        $filme = Filme::create([
            'nome' => $request->get('nome'),
            'categoria' => $request->get('categoria')
        ]);

        $atores = $request->get('atores');
        if(!empty($atores)) {
            $atores = array_unique($atores);
            foreach ($atores as $a => $value) {
                FilmeAtor::create([
                    'filme_id' => $filme->id,
                    'ator_id'=> $atores[$a]
                ]);
            }
        }

        return redirect()->route('filmes');
        */


        /* Exige pelo menos UM ator vinculado ao filme */
        $atores = $request->get('atores');
        if(!empty($atores)) {
            $filme = Filme::create([
                'nome' => $request->get('nome'),
                'categoria' => $request->get('categoria')
            ]);

            $atores = array_unique($atores);
            foreach ($atores as $a => $value) {
                FilmeAtor::create([
                    'filme_id' => $filme->id,
                    'ator_id'=> $atores[$a]
                ]);
            }
            return redirect()->route('filmes');
        }
        else {
            return redirect()->back()->withInput()->with('message', 'Não é possível salvar um filme sem adicionar, pelo menos, UM ator!');
        }
    }
}
