<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ator extends Model
{
    protected $table = "pedido";
    protected $fillable = ['idPedido', 'itensPedido_idItens', 'valorTotal'];

    public function nacionalidade() {
        return $this->belongsTo("App\Nacionalidade");
    }
}
