@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3>Editar Pedido</h3>
            </div>
        </div>
    </div>

    {!! Form::model($pedido, ['route' => ['pedidos.update', $pedido->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('data_pedido', 'Data do Pedido:') !!}
            {!! Form::date('data_pedido', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('produtos', 'Produtos:') !!}
            {!! Form::select('produtos[]', $produtos, $pedido->produtos->pluck('id')->toArray(), ['class' => 'form-control', 'multiple', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Atualizar Pedido', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop
