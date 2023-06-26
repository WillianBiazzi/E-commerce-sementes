@extends('adminlte::page')

@section('content')
    <h3>Novo Produto</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => 'produtos.store'])  !!}
        <div class="form-group">
            {!! Form::label('nomeProduto', 'Nome do Produto:') !!}
            {!! Form::text('nomeProduto', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição do Produto:') !!}
            {!! Form::text('descricao', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('preco', 'Preço do Produto:') !!}
            {!! Form::number('preco', null, ['class' => 'form-control', 'step' => '0.01', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fk_estoque_idEstoque', 'ID do Estoque:') !!}
            {!! Form::number('fk_estoque_idEstoque', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar Produto', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop
