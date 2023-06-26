@extends('adminlte::page')

@section('content')
    <h3>Novo Estoque</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'estoques.store']) !!}
        <div class="form-group">
            {!! Form::label('Qtd', 'Quantidade:') !!}
            {!! Form::number('Qtd', null, ['class' => 'form-control', 'required', 'step' => '0.01']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('IdEstoque', 'ID do Estoque') !!}
            {!! Form::number('IdEstoque', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar Estoque', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop
