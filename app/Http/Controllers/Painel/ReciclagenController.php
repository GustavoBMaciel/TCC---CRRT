<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Reciclagem;
use App\Http\Requests\Painel\ReciclagemFormRequest;
use App\Models\Painel\Produtosremp;
use App\Models\Painel\Beneficiario;
use App\Models\Painel\Produto;
use App\Models\Painel\User;

class ReciclagenController extends Controller
{
  private $produtosremp;
  private $reciclagem;
  private $totalPage = 5;

  public function __construct(Reciclagem $reciclagem)
  {
    $this->middleware('auth');

    $this->reciclagem = $reciclagem;
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
  $title = 'Listagem de Movimentos para Reciclagem';

  $reciclagens = $this->reciclagem->paginate($this->totalPage);

  return view ('painel.reciclagens.index', compact('reciclagens', 'title'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
  $title = 'Cadastrar Novo Movimento para Reciclagem';

  /*$produtos = Produto::select('id','nome', 'quantidade', 'categoria')->pluck( 'id', 'nome', 'quantidade', 'categoria')->all();*/
  $idBeneficiarios = Beneficiario::select('id')->where('ativo', '=', '1')->pluck('id')->all();

  $idUsers = User::select('id')->pluck('id')->all();

  $idProdutos = Produto::select('id','nome', 'quantidade', 'categoria')->where([['ativo', '=', '1'], ['categoria', '=', 'reciclagem']])->get();

  return view('painel.reciclagens.create-edit',compact('title', 'idUsers', 'idBeneficiarios', 'idProdutos'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(ReciclagemFormRequest $request)
{
  $dataForm = $request->all();

  /*dd($dataForm);*/

  $insert = $this->reciclagem->create([
    'idUser' => $dataForm['idUser'],
    'idBeneficiario' => $dataForm['idBeneficiario']]);


    if ($insert)
    {
      $ide = Reciclagem::select('id')->take(1);

      foreach($dataForm['idProduto'] as $idProdutos)
      {
        Produtosremp::insert(['idReciclagem' => $insert->id,
        'idProduto' => $idProdutos]);

        $affectedRows = Produto::where('id', $idProdutos)->update(['categoria' => 'reciclado']);
      }
      return redirect()->route('reciclagens.index');
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
    $reciclagemShow = $this->reciclagem->find($id);

    $title = "Visualizando Movimento para Reciclagem Numero: {$reciclagemShow->id}";

    $idprodutosremp = Produtosremp::select('idProduto')->where('idReciclagem', '=', $reciclagemShow->id )->get();

    return view('painel.reciclagens.show', compact('title', 'reciclagemShow', 'idprodutosremp'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $reciclagemEdit = $this->reciclagem->find($id);

    $idBeneficiarios = Beneficiario::select('id')->where('ativo', '=', '1')->pluck('id')->all();

    $idUsers = User::select('id')->pluck('id')->all();

    $idProdutos = Produto::select('id','nome', 'quantidade', 'categoria')->where([['ativo', '=', '1'], ['categoria', '=', 'reciclagem']])->get();

    $title = "Editar Movimento para Reciclagem Numero: {$reciclagemEdit->id}";

    return view('painel.reciclagens.create-edit', compact('title', 'reciclagemEdit', 'idUsers', 'idProdutos', 'idBeneficiarios'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(ReciclagemFormRequest $request, $id)
  {
    $dataForm = $request->all();

    $affectedRows = Reciclagem::where('id', $id)->update([
      'idUser' => $dataForm['idUser'],
      'idBeneficiario' => $dataForm['idBeneficiario']]);

      foreach($dataForm['idProduto'] as $idProdutos)
      {
        $affectedRows = produtosremp::where('idReciclagem', $id)->update(['idProduto' => $idProdutos]);
      }

      if ($affectedRows)
      {
        return redirect()->route('reciclagens.index');
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
      $reciclagemDestroy = $this->reciclagem->find($id);

      $delete = $reciclagemDestroy->delete();

      if ( $delete )
      return redirect()->route('reciclagens.index');
      else
      return redirect()->route('reciclagens.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

  }
