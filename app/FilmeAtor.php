<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmeAtor extends Model
{
    protected $table = "filme_atores";
    protected $fillable = ['filme_id', 'ator_id'];

    public function ator() {
        return $this->belongsTo("App\Ator");
    }
}
