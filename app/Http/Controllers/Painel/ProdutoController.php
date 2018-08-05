<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;
use App\Http\Requests\Painel\ProdutoFormRequest;
use App\Http\Controllers\Auth;


class ProdutoController extends Controller
{

  private $produto;
  private $totalPage = 5;

  public function __construct(Produto $produto)
  {
    $this->middleware('auth');

    $this->produto = $produto;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $title = 'Listagem de Produtos';

    $produtos = $this->produto->paginate($this->totalPage);
    return view ('painel.produtos.index', compact('produtos', 'title'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $title = 'Cadastrar Novo Produto';

    $categorias = ['reciclagem', 'emprestimo'];

    return view('painel.produtos.create-edit',compact('title', 'categorias') );
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ProdutoFormRequest $request)
  {
    $dataForm = $request->all();

    $imageName = $request->id . '.' .
    $request->file('imagem')->getClientOriginalName();

    $image = $request->file('imagem')->move(
      base_path() . '\public\assests\painel\imgs', $imageName);

      $dataForm['ativo'] = ( !isset ($dataForm['ativo']) ) ? 0 : 1;

      $insert = $this->produto->create(['nome' => $dataForm['nome'],
      'quantidade' => $dataForm['quantidade'],
      'ativo' => $dataForm['ativo'],
      'imagem' => $imageName,
      'categoria' => $dataForm['categoria'],
      'descricao' => $dataForm['descricao'],



    ]);
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
    $produtoShow = $this->produto->find($id);

    $title = "Visualizando Produto: {$produtoShow->nome}";

    return view('painel.produtos.show', compact('title', 'produtoShow'));

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $produtoEdit = $this->produto->find($id);

    $title = "Editar Produto: {$produtoEdit->nome}";

    $categorias = ['reciclagem', 'emprestimo'];

    return view('painel.produtos.create-edit', compact('title', 'categorias', 'produtoEdit'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(ProdutoFormRequest $request, $id)
  {
    $dataForm = $request->all();

    $produtoEditado = $this->produto->find($id);

    $imageName = $request->id . '.' .
    $request->file('imagem')->getClientOriginalName();

    $image = $request->file('imagem')->move(
      base_path() . '\public\assests\painel\imgs', $imageName);

      $dataForm['ativo'] = ( !isset ($dataForm['ativo']) ) ? 0 : 1;

      $update = $produtoEditado->update(['nome' => $dataForm['nome'],
      'quantidade' => $dataForm['quantidade'],
      'ativo' => $dataForm['ativo'],
      'imagem' => $imageName,
      'categoria' => $dataForm['categoria'],
      'descricao' => $dataForm['descricao'],
    ]);

    if ( $update )
    return redirect()->route('produtos.index');
    else
    return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function destroy($id)
  {
    $produtoDestroy = $this->produto->find($id);

    $delete = $produtoDestroy->delete();

    if ( $delete )
    return redirect()->route('produtos.index');
    else
    return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);
  }
}
