<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = 'PedidoProduto';

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'fk_Produtos_IdProduto', 'IdProduto');
    }


    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'fk_Pedidos_IdPedido', 'IdPedido');
    }
}
