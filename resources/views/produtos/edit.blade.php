@extends('adminlte::page')

@section('content')
    <h3>Editando Produto: {{ $produto->NomeProduto }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($produto, ['route' => ['produtos.update', $produto->IdProduto], 'method' => 'put']) !!}
@method('PUT')

    <div class="form-group">
        {!! Form::label('nomeProduto', 'Nome do Produto:') !!}
        {!! Form::text('nomeProduto', $produto->NomeProduto, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::text('descricao', $produto->Descricao, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('preco', 'Preço:') !!}
        {!! Form::number('preco', $produto->Preco, ['class' => 'form-control', 'required', 'step' => '0.01']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fk_Estoque_idEstoque', 'ID do Estoque:') !!}
        {!! Form::select('fk_Estoque_idEstoque', $estoques, $produto->fk_Estoque_IdEstoque, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Editar Produto', ['class' => 'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}

    @stop

