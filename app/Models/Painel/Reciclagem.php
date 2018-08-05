<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Reciclagem extends Model
{
    protected $fillable = ['idUser', 'idBeneficiario', 'idProduto'];
}
