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
            {!! Form::label('qtd', 'Quantidade:') !!}
            {!! Form::number('qtd', null, ['class' => 'form-control', 'required', 'step' => '0.01']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('idEstoque', 'ID do Estoque') !!}
            {!! Form::number('idEstoque', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar Estoque', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop
