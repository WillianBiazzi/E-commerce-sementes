<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "Pedidos";
    protected $primaryKey = 'IdPedido'; // Definir a chave primária da tabela
    protected $fillable = ['IdPedido', 'DataPedido', 'fk_Clientes_IdCliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_Clientes_IdCliente');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'PedidoProduto', 'fk_Pedidos_IdPedido', 'fk_Produtos_IdProduto')
                    ->withPivot('QtdPedido');
    }
}
