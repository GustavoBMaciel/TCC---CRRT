<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'quantidade', 'ativo', 'imagem', 'categoria', 'descricao'];

}
