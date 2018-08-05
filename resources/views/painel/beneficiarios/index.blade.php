@extends('layouts.app')
@section('content')
<div class="container">

      <div class="panel-heading">Listagem de Beneficiarios</div>
      <a href="{{ url('/home') }}" class="btn btn-success btn-add">Voltar</a>
      <a href="{{route('beneficiarios.create')}}" class="btn btn-success btn-add"><span class="glyphicon glyphicon-plus "></span>Cadastrar</a>

      <table  class="table table-striped">
        <tr>
          <th>ID</th>
          <th>CNPJ</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Status</th>
          <th>Data de Cadastro</th>
          <th width="100px">Ações</th>
        </tr>
        @foreach ($beneficiarios as $beneficiario)
        <tr>
          <td>{{$beneficiario->id}}</td>
          <td>{{$beneficiario->cnpj}}</td>
          <td>{{$beneficiario->nome}}</td>
          <td>{{$beneficiario->email}}</td>
          <td>{{$beneficiario->ativo}}</td>
          <td>{{$beneficiario->created_at}}</td>
          <td>
            <a href="{{route('beneficiarios.edit', $beneficiario->id)}}" class="actions edit">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('beneficiarios.show', $beneficiario->id)}}" class="actions delete">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
          </td>
        </tr>
        @endforeach
      </table>

      <hr>

      {!! $beneficiarios->links() !!}
    </div>
  </div>
  @endsection
