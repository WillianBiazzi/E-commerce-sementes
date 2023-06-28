@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Novo Pedido</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="cliente">Cliente:</label>
                    <select name="cliente_id" id="cliente" class="form-control" required>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->idCliente }}">{{ $cliente->nomeCliente }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="dataPedido">Data do Pedido:</label>
                    <input type="date" name="dataPedido" id="dataPedido" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="produtos">Produtos:</label>
                    <select name="produtos[]" id="produtos" class="form-control" multiple required>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->idProduto }}">{{ $produto->nomeProduto }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="qtdPedido">Quantidade:</label>
                    <input type="number" name="qtdPedido" id="qtdPedido" class="form-control" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="valorTotal">Valor Total:</label>
                    <input type="number" name="valorTotal" id="valorTotal" class="form-control" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary">Criar Pedido</button>
                <a href="{{ route('pedidos.index') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    </div>
@stop
