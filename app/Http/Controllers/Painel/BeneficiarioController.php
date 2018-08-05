<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Beneficiario;
use App\Http\Requests\Painel\BeneficiarioFormRequest;

class BeneficiarioController extends Controller
{

  private $beneficiario;
  private $totalPage = 5;

  public function __construct(Beneficiario $beneficiario)
  {
    $this->middleware('auth');

    $this->beneficiario = $beneficiario;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $title = 'Listagem de Beneficiarios';

    $beneficiarios = $this->beneficiario->paginate($this->totalPage);
    return view ('painel.beneficiarios.index', compact('beneficiarios', 'title'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $title = 'Cadastrar Novo Beneficiario';

    return view('painel.beneficiarios.create-edit',compact('title') );
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(BeneficiarioFormRequest $request)
  {
    $dataForm = $request->all();

    $dataForm['ativo'] = ( !isset ($dataForm['ativo']) ) ? 0 : 1;

    $insert = $this->beneficiario->create($dataForm);
    if ($insert)
    {
      return redirect()->route('beneficiarios.index');
    }
    else {
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
    $beneficiarioShow = $this->beneficiario->find($id);

    $title = "Visualizando Beneficiario: {$beneficiarioShow->nome}";

    return view('painel.beneficiarios.show', compact('title', 'beneficiarioShow'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $beneficiarioEdit = $this->beneficiario->find($id);

    $title = "Editar Beneficiario: {$beneficiarioEdit->nome}";

    return view('painel.beneficiarios.create-edit', compact('title', 'beneficiarioEdit'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(BeneficiarioFormRequest $request, $id)
  {
    $dataForm = $request->all();

    $beneficiarioEditado = $this->beneficiario->find($id);

    $dataForm['ativo'] = ( !isset ($dataForm['ativo']) ) ? 0 : 1;

    $update = $beneficiarioEditado->update($dataForm);

    if ( $update )
    return redirect()->route('beneficiarios.index');
    else
    return redirect()->route('beneficiarios.edit', $id)->with(['errors' => 'Falha ao editar']);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $beneficiarioDestroy = $this->beneficiario->find($id);

    $delete = $beneficiarioDestroy->delete();

    if ( $delete )
    return redirect()->route('beneficiarios.index');
    else
    return redirect()->route('beneficiarios.show', $id)->with(['errors' => 'Falha ao deletar']);
  }
}
