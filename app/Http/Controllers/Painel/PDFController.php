<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produtosemp;
use App\Models\Painel\Beneficiario;
use App\Models\Painel\Produto;
use App\Models\Painel\Emprestimo;
use App\Models\Painel\User;
use App\Models\Painel\PDF;


class PDFController extends Controller
{

  public function pdf($id)
  {
    /*$emprestimoShow = $this->emprestimo->find($id);

    $title = "Visualizando Emprestimo: {$emprestimoShow->id}";

    $idProdutosEmp = Produtosemp::select('idProduto')->where('idEmprestimo', '=', $emprestimoShow->id )->get();
*/
    $pdf=PDF::loadView('painel.pdf', compact('title', 'emprestimoShow', 'idProdutosEmp'));

    return $pdf->stream();
  }
/*
  public function pdf()
  {
   $idEmp = Emprestimo::all();


   $pdf=PDF::loadView('painel.pdf', ['idEmp' => $idEmp]);

   return $pdf->stream('painel.pdf');

    $idEmp = Emprestimo::select('id', 'idUser', 'idBeneficiario')->where('id', '=', $emprestimoEdit->id )->get();
    $idProdutosEmp = Produtosemp::select('idProduto')->where('idEmprestimo', '=', $emprestimoEdit->id )->get();
    $pdf=PDF::loadView('painel.pdf', ['idEmpid' => $idEmp->id,
    'idEmpuser' => $idEmp->idUser,
    'idEmpbeneficiario' => $idEmp->idBeneficiario,
    'idProdutosEmp' => $idProdutosEmp]);
    return $pdf->stream('painel.pdf');
    */

  }
