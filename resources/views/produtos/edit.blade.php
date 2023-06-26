@extends('adminlte::page')

@section('content')
    <h3>Editando Produto: {{ $produto->nomeProduto }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produtos.update', $produto->idProduto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomeProduto">Nome do Produto:</label>
            <input type="text" name="nomeProduto" id="nomeProduto" class="form-control" value="{{ $produto->nomeProduto }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $produto->descricao }}" required>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" class="form-control" value="{{ $produto->preco }}" required step="0.01">
        </div>

        <div class="form-group">
            <label for="fk_estoque_IdEstoque">ID do Estoque:</label>
            <input type="text" name="fk_estoque_idEstoque" id="fk_estoque_idEstoque" class="form-control" value="{{ $produto->fk_estoque_idEstoque }}">
        </div>

        <button type="submit" class="btn btn-primary">Editar Produto</button>
        <button type="reset" class="btn btn-default">Limpar</button>
    </form>
@stop
