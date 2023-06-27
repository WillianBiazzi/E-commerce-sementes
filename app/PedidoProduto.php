<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = 'pedidoproduto';

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'fk_produtos_idProduto', 'idProduto');
    }
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'fk_pedidos_idPedido', 'idPedido');
    }
}





