<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioFormRequest extends FormRequest
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
    return ['cpf' => 'required|numeric|unique:funcionarios|digits:11',
    'nome' => 'required|min:3|max:100',
    'telefone' => 'required|numeric',
    'nascimento' => 'required|date',
    'sexo' => 'required',
    'endereco' => 'required|min:3|max:100',
    'numero' => 'required|numeric',
    'bairro' => 'required|min:3|max:100',
    'complemento' => 'required|min:3|max:100',
    'email' => 'required|email|min:3|max:100|unique:funcionarios',
    'password' => 'required|min:3|max:100'
  ];
}
}
