@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h3>Listagem de Pedidos</h3>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Pedido</th>
            <th>DataPedido</th>
            <th>Produtos</th>
            <th>Descrição</th>
            <th>Preço</th>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
    <tr>
        <td>{{ $pedido->IdPedido }}</td>
        <td>{{ $pedido->DataPedido }}</td>
        @if ($pedido->produtos->isNotEmpty())
            <td>
                @foreach ($pedido->produtos as $produto)
                    {{ $produto->NomeProduto }},
                @endforeach
            </td>
            <td>
                @foreach ($pedido->produtos as $produto)
                    {{ $produto->Descricao }},
                @endforeach
            </td>
            <td>
                @foreach ($pedido->produtos as $produto)
                    {{ $produto->Preco }},
                @endforeach
            </td>
        @else
            <td>Produto não encontrado</td>
            <td>Descrição não encontrada</td>
            <td>Preço não encontrado</td>
        @endif
    </tr>
@endforeach
        </tbody>
    </table>

    <a href="{{ route('pedidos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop
