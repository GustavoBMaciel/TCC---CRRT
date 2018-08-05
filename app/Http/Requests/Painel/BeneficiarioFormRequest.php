<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiarioFormRequest extends FormRequest
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
    return ['cnpj' => 'digits:14|numeric|required|unique:beneficiarios,id,'.$this->get('id'),
    'inscricaoestadual' => 'digits:11,|numeric|required|unique:beneficiarios,id,'.$this->get('id'),
    'nome' => 'required|min:3|max:100',
    'telefone' => 'required|numeric',
    'endereco' => 'required|min:3|max:100',
    'numero' => 'required|numeric',
    'bairro' => 'required|min:3|max:100',
    'complemento' => 'required|min:3|max:100',
    'email' => '|email|min:3|max:100|required|unique:beneficiarios,id,'.$this->get('id'),
    'descricao' => 'min:3|max:1000',
    'assinatura' => 'required|min:3|max:100'
  ];
}
}
