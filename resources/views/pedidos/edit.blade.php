@extends('layouts.default')

@section('content')

<div class="container-fluid">
    <h3>Editar Pedido</h3>
</div>
<form action="{{ route('pedidos.update', ['pedido' => $pedido->id]) }}" method="POST">
    @csrf
    @method('PUT')

<div class="form-group">
    <label for="valor_total">Valor Total:</label>
    <input type="text" name="valor_total" class="form-control" value="{{ $pedido->valor_total }}">
</div>

<div class="form-group">
    <label for="produtos">Produtos:</label>
    <select name="produtos[]" class="form-control" multiple>
        @foreach ($produtos as $produto)
        <option value="{{ $produto->idProduto }}" @if (in_array($produto->idProduto, $pedido->produtos->pluck('idProduto')->toArray())) selected @endif>{{ $produto->descricaoProduto }}</option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
</form>
@stop
