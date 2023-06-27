<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $primaryKey = 'idPedido'; // Definir a chave primária da tabela
    protected $fillable = ['idPedido', 'dataPedido', 'fk_clientes_idCliente', 'valorTotal']; // Adicionei o campo 'valor_total' na lista de atributos preenchíveis

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_clientes_idCliente');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedidoproduto', 'fk_pedidos_idPedido', 'fk_produtos_idProduto')
                    ->withPivot('qtdPedido');
    }
}
