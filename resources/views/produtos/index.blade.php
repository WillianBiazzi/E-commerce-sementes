@extends('layouts.default')

@section('content')
    <h3>Listagem de Produtos</h3>
    {!! Form::open(['name'=>'form_name', 'route'=>'produtos']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
    {!! Form::close() !!}
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>ID Produto</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->idProduto }}</td>
                    <td>{{ $produto->nomeProduto }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ isset($produto->estoque->Qtd) ? $produto->estoque->Qtd : "Estoque não informado" }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', ['idProduto' => \Crypt::encrypt($produto->idProduto)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="{{ route('produtos.destroy', ['idProduto' => \Crypt::encrypt($produto->idProduto)]) }}" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($produto->idProduto) }}')" class="btn-sm btn-danger">Remover</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $produtos->links() }}

    <a href="{{ route('produtos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
    "Produtos"
@endsection
