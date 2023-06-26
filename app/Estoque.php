<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoque'; // Nome da tabela correspondente ao modelo no banco de dados
    protected $primaryKey = 'IdEstoque'; // Nome da coluna que é a chave primária
    public $timestamps = false; // Defina como false se a tabela não tiver colunas 'created_at' e 'updated_at'

    // Define as colunas que podem ser preenchidas em massa
    protected $fillable = ['IdEstoque', 'Qtd'];

    // Relacionamento com a tabela de Produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'fk_estoque_IdEstoque', 'IdEstoque');
    }
}
