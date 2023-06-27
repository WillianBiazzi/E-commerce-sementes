@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3>Listagem de Pedidos</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('pedidos.create', []) }}" class="btn btn-info">Adicionar Novo Pedido</a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Pedido</th>
            <th>DataPedido</th>
            <th>Produtos</th>
            <th>Valor total</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr class="pedido-item">
                    <td>{{ $pedido->idPedido }}</td>
                    <td>{{ $pedido->dataPedido }}</td>
                    <td>
                        @if ($pedido->produtos->isNotEmpty())
                            <div class="produto-info hidden">
                                <strong>Detalhes do Pedido:</strong>
                                <ul>
                                    @php
                                        $totalPedido = 0;
                                    @endphp
                                    @foreach ($pedido->produtos as $produto)
                                        <li>
                                            <strong>Produto:</strong> {{ $produto->nomeProduto }}<br>
                                            <strong>Valor unitário:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}<br>
                                            <strong>Quantidade:</strong> {{ number_format($produto->pivot->qtdPedido / 40, 2, ',', '.') }} SC<br>
                                            <strong>Valor total do item:</strong> R$ {{ number_format($produto->preco * $produto->pivot->qtdPedido, 2, ',', '.') }}
                                        </li>
                                        @php
                                            $totalPedido += $produto->preco * $produto->pivot->qtdPedido;
                                        @endphp
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            Produto não encontrado
                        @endif
                    </td>
                    <td>
                        @if ($pedido->produtos->isNotEmpty())
                            Valor total do pedido: R$ {{ number_format($totalPedido, 2, ',', '.') }}
                        @else
                            Valor total não calculado
                        @endif
                    </td>
                    <td>
                        <ul>
                            <a href="{{ route('pedidos.edit', ['id' => \Crypt::encrypt($pedido->idPedido)]) }}" class="btn-sm btn-success">Editar</a>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $pedidos->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".pedido-item").click(function() {
                var $produtoInfo = $(this).find(".produto-info");
                if ($produtoInfo.hasClass("hidden")) {
                    $produtoInfo.removeClass("hidden");
                } else {
                    $produtoInfo.addClass("hidden");
                }
            });
        });
    </script>
@stop
    