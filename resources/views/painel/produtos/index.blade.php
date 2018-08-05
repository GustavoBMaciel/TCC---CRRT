@extends('layouts.app')
@section('content')
<div class="container">

      <div class="panel-heading">Listagem de Materiais</div>
      <a href="{{ url('/home') }}" class="btn btn-success btn-add">Voltar</a>
      <a href="{{route('produtos.create')}}" class="btn btn-success btn-add"><span class="glyphicon glyphicon-plus "></span>Cadastrar</a>

      <table  class="table table-hover">
        <tr>
          <th>Imagem</th>
          <th>ID</th>
          <th>Nome</th>
          <th>Quantidade</th>
          <th>Categoria</th>
          <th>Status</th>
          <th>Data de Cadastro</th>
          <th width="100px">Ações</th>
        </tr>
        @foreach ($produtos as $produto)
        <tr>

          <td><img width="100px" src="{{ url('/assests/painel/imgs/', $produto->imagem )}}" alt=""></td>
          <td>{{$produto->id}}</td>
          <td>{{$produto->nome}}</td>
          <td>{{$produto->quantidade}}</td>
          <td>{{$produto->categoria}}</td>
          <td>{{$produto->ativo}}</td>
          <td>{{$produto->created_at}}</td>
          <td>
            <a href="{{route('produtos.edit', $produto->id)}}" class="actions edit">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('produtos.show', $produto->id)}}" class="actions delete">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
          </td>
        </tr>
        @endforeach
      </table>
      <hr>
      {!! $produtos->links() !!}
    </div>
  </div>
  @endsection
