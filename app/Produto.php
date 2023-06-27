<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Estoque;
use App\Pedido;

class Produto extends Model
{
    protected $fillable = ['nomeProduto', 'descricao', 'preco', 'fk_estoque_idEstoque'];
    protected $primaryKey = 'idProduto';
    protected $table = 'produtos';

    public function estoque()
    {
        return $this->belongsTo(Estoque::class, 'fk_estoque_idEstoque', 'idEstoque');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedidoProduto', 'fk_produtos_idProduto', 'fk_pedidos_idPedido')
                    ->withPivot('qtdPedido');
    }
}

