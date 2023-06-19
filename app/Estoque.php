<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'Estoque';
    protected $primaryKey = 'IdEstoque';
    public $timestamps = false;

    // Define as colunas que podem ser preenchidas em massa
    protected $fillable = [
        'Qtd',
        'IdEstoque',
    ];

    // Relacionamento com a tabela de Produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'fk_Estoque_IdEstoque', 'IdEstoque');
    }
}
