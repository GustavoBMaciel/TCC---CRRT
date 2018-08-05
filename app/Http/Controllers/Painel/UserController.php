<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\User;
use App\Http\Requests\Painel\UserFormRequest;
use App\Http\Controllers\Auth;


class UserController extends Controller
{

  private $user;
  private $totalPage = 5;

  public function __construct(User $user)
  {
    $this->middleware('auth');

    $this->user = $user;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $title = 'Listagem de Usuarios';

    $users = $this->user->paginate($this->totalPage);
    return view ('painel.usuarios.index', compact('users', 'title'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(UserFormRequest $request)
  {
    $dataForm = $request->all();

    $insert = $this->user->create($dataForm);
    if ($insert)
    {
      return redirect()->route('produtos.index');
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
    $userShow = $this->user->find($id);

    $title = "Visualizando Usuarios: {$userShow->name}";

    return view('painel.usuarios.show', compact('title', 'userShow'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $userEdit = $this->user->find($id);

    $title = "Editar Usuario: {$userEdit->name}";

    return view('painel.usuarios.create-edit', compact('title', 'userEdit'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UserFormRequest $request, $id)
  {
    $dataForm = $request->all();

    $userEditado = $this->user->find($id);

    $update = $userEditado->update($dataForm);

    if ( $update )
    return redirect()->route('usuarios.index');
    else
    return redirect()->route('usuarios.edit', $id)->with(['errors' => 'Falha ao editar']);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $userDestroy = $this->user->find($id);

    $delete = $userDestroy->delete();

    if ( $delete )
    return redirect()->route('usuarios.index');
    else
    return redirect()->route('usuarios.show', $id)->with(['errors' => 'Falha ao deletar']);
  }
}
