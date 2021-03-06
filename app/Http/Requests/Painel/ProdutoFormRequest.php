<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    return ['nome'        => 'required|min:3|max:100|',
    'quantidade'  => 'required|numeric',
    'categoria'   => 'required',
    'descricao'   => 'min:3|max:1000',
    'imagem' => 'required|image|mimes:jpeg|max:2048|',
  ];
}
}
