<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
  public function __construct()
  {
    /*$this->middleware('auth');*/
  }
  public function usuario()
  {
    return view('painel.usuarios');
  }
  public function emprestimo()
  {
    return view('painel.emprestimo');
  }
  public function produto()
  {
    return view('painel.produto');
  }
  public function beneficiario()
  {
    return view('painel.beneficiario');
  }

}
