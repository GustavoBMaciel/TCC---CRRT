<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
  protected $fillable = ['idUser', 'idBeneficiario', 'idProduto'];
}
