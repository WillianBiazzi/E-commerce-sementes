<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:30',
            'descricao' => 'required|max:50',
            'preco' => 'required|numeric',
            'fk_estoque_idEstoque' => 'required|exists:estoque,IdEstoque',
        ];
    }
}
