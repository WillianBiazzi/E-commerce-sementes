<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estoque;

class Produto extends Model
{
    protected $fillable = ['nomeProduto', 'descricao', 'preco', 'fk_Estoque_IdEstoque'];
    protected $primaryKey = 'IdProduto';
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

