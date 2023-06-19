<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = "filmes";
    protected $fillable = ['nome', 'categoria'];

    public function atores() {
        return $this->hasMany("App\FilmeAtor");
    }
}
