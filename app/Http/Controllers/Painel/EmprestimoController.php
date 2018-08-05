<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Emprestimo;
use App\Http\Requests\Painel\EmprestimoFormRequest;
use App\Models\Painel\Produtosemp;
use App\Models\Painel\Beneficiario;
use App\Models\Painel\Produto;
use App\Models\Painel\User;

class EmprestimoController extends Controller
{
  private $produtosEmp;
  private $emprestimo;
  private $totalPage = 5;

  public function __construct(Emprestimo $emprestimo)
  {
    $this->middleware('auth');

    $this->emprestimo = $emprestimo;
  }

  /*public function __construct(App\Models\Painel\ProdutosEmp $produtosEmp)
  {
  $this->produtosEmp = $produtosEmp;
}*/

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
  $title = 'Listagem de Emprestimo';

  $emprestimos = $this->emprestimo->paginate($this->totalPage);

  return view ('painel.emprestimos.index', compact('emprestimos', 'title'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
  $title = 'Cadastrar Novo Emprestimo';

  /*$produtos = Produto::select('id','nome', 'quantidade', 'categoria')->pluck( 'id', 'nome', 'quantidade', 'categoria')->all();*/
  $idBeneficiarios = Beneficiario::select('id')->where('ativo', '=', '1')->pluck('id')->all();

  $idUsers = User::select('id')->pluck('id')->all();

  $idProdutos = Produto::select('id','nome', 'quantidade', 'categoria')->where([['ativo', '=', '1'], ['categoria', '=', 'emprestimo']])->get();

  return view('painel.emprestimos.create-edit',compact('title', 'idUsers', 'idBeneficiarios', 'idProdutos'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(EmprestimoFormRequest $request)
{
  $dataForm = $request->all();

  $insert = $this->emprestimo->create([
    'idUser' => $dataForm['idUser'],
    'idBeneficiario' => $dataForm['idBeneficiario']]);

    if ($insert)
    {
      $ide = Emprestimo::select('id')->take(1);

      foreach($dataForm['idProduto'] as $idProdutos)
      {
        Produtosemp::insert(['idEmprestimo' => $insert->id,
        'idProduto' => $idProdutos]);

        $affectedRows = Produto::where('id', $idProdutos)->update(['categoria' => 'emprestado']);
      }
      return redirect()->route('emprestimos.index');
    }
    else
    {
      return redirect()->back();
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $emprestimoShow = $this->emprestimo->find($id);

    $title = "Visualizando Emprestimo: {$emprestimoShow->id}";

    $idProdutosEmp = Produtosemp::select('idProduto')->where('idEmprestimo', '=', $emprestimoShow->id )->get();

    return view('painel.emprestimos.show', compact('title', 'emprestimoShow', 'idProdutosEmp'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $emprestimoEdit = $this->emprestimo->find($id);

    $idBeneficiarios = Beneficiario::select('id')->where('ativo', '=', '1')->pluck('id')->all();

    $idUsers = User::select('id')->pluck('id')->all();

    $idProdutos = Produto::select('id','nome', 'quantidade', 'categoria')->where([['ativo', '=', '1'], ['categoria', '=', 'emprestimo']])->get();

    $title = "Editar Emprestimo: {$emprestimoEdit->id}";

    return view('painel.emprestimos.create-edit', compact('title', 'emprestimoEdit', 'idUsers', 'idProdutos', 'idBeneficiarios'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(EmprestimoFormRequest $request, $id)
  {
    $dataForm = $request->all();

    $affectedRows = Emprestimo::where('id', $id)->update([
      'idUser' => $dataForm['idUser'],
      'idBeneficiario' => $dataForm['idBeneficiario']]);

      foreach($dataForm['idProduto'] as $idProdutos)
      {
        $affectedRows = Produtosemp::where('idEmprestimo', $id)->update(['idProduto' => $idProdutos]);
      }

      if ($affectedRows)
      {
        return redirect()->route('emprestimos.index');
      }
      else
      {
        return redirect()->back();
      }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $emprestimoDestroy = $this->emprestimo->find($id);

      $delete = $emprestimoDestroy->delete();

      if ( $delete )
      return redirect()->route('emprestimos.index');
      else
      return redirect()->route('emprestimos.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

  }
