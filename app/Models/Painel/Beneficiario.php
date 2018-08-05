<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $fillable = ['cnpj','inscricaoestadual', 'nome', 'telefone', 'endereco', 'numero', 'bairro', 'complemento', 'ativo', 'email', 'descricao', 'assinatura'];
}
