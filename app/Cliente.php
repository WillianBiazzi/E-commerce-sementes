<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'Clientes';
    protected $primaryKey = 'IdCliente';
    public $timestamps = false;
    // Defina os atributos do modelo e relacionamentos, se houver
}
