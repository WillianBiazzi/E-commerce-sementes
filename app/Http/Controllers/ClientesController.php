<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Verifica se foi fornecido um critério de pesquisa
        if ($search) {
            $clientes = Cliente::where('NomeCliente', 'like', '%' . $search . '%')
                ->orWhere('Endereco', 'like', '%' . $search . '%')
                ->orWhere('Email', 'like', '%' . $search . '%')
                ->get();
        } else {
            $clientes = Cliente::all();
        }

        return view('clientes.index', compact('clientes', 'search'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'IdCliente' => 'required|integer',
            'NomeCliente' => 'required|string|max:50',
            'Endereco' => 'required|string|max:100',
            'Email' => 'required|email|max:50',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'IdCliente' => 'required|integer',
            'NomeCliente' => 'required|string|max:50',
            'Endereco' => 'required|string|max:100',
            'Email' => 'required|email|max:50',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
