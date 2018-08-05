@extends('layouts.app')
@section('content')
<div class="container">

      <div class="panel-heading">Listagem de Emprestimos</div>
      <a href="{{ url('/home') }}" class="btn btn-success btn-add">Voltar</a>
      <a href="{{route('emprestimos.create')}}" class="btn btn-success btn-add"><span class="glyphicon glyphicon-plus "></span>Cadastrar</a>

      <table  class="table table-striped">
        <tr>
          <th>ID</th>
          <th>Funcionario</th>
          <th>Beneficiario</th>
          <th>Data de Cadastro</th>
          <th>Ações</th>
        </tr>
        @foreach ($emprestimos as $emprestimo)
        <tr>
          <td>{{$emprestimo->id}}</td>
          <td>{{$emprestimo->idUser}}</td>
          <td>{{$emprestimo->idBeneficiario}}</td>
          <td>{{$emprestimo->created_at}}</td>
          <td>
            <a href="{{route('emprestimos.edit', $emprestimo->id)}}" class="actions edit">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('emprestimos.show', $emprestimo->id)}}" class="actions delete">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>

          </td>
        </tr>
        @endforeach
      </table>
      <hr>
      {!! $emprestimos->links() !!}
    </div>

  @endsection
