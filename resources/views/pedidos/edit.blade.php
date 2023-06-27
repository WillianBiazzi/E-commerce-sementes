@extends('adminlte::page')

@section('content')
    <h3>Editando Pedido: {{ $pedido->idPedido }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('pedidos.update', $pedido->idPedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="dataPedido">Data do Pedido:</label>
            <input type="date" name="dataPedido" id="dataPedido" class="form-control" value="{{ $pedido->dataPedido }}" required>
        </div>

        <div class="form-group">
            <label for="produtos">Produtos:</label>
            <select name="produtos[]" id="produtos" class="form-control" multiple required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->idProduto }}" {{ in_array($produto->idProduto, $pedido->produtos->pluck('idProduto')->toArray()) ? 'selected' : '' }}>
                        {{ $produto->nomeProduto }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valorTotal">Valor Total:</label>
            <input type="number" name="valorTotal" id="valorTotal" class="form-control" value="{{ $pedido->valorTotal }}" required step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Editar Pedido</button>
        <button type="reset" class="btn btn-default">Limpar</button>
    </form>
@stop
