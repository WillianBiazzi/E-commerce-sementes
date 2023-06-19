<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $primaryKey = 'IdProduto';
    // restante do código do modelo

    protected $table = 'Produtos';

    public function estoque()
    {
        return $this->belongsTo(Estoque::class, 'fk_Estoque_IdEstoque', 'IdEstoque');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'PedidoProduto', 'fk_Produtos_IdProduto', 'fk_Pedidos_IdPedido')
                    ->withPivot('QtdPedido');
    }
}
