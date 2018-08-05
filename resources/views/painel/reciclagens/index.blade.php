@extends('layouts.app')
@section('content')
<div class="container">

      <div class="panel-heading">Listagem de Movimentos para Reciclagem</div>
      <a href="{{ url('/home') }}" class="btn btn-success btn-add">Voltar</a>
      <a href="{{route('reciclagens.create')}}" class="btn btn-success btn-add"><span class="glyphicon glyphicon-plus "></span>Cadastrar</a>

      <table  class="table table-striped">
        <tr>
          <th>ID</th>
          <th>Funcionario</th>
          <th>Beneficiario</th>
          <th>Ações</th>
          <th>Data de Cadastro</th>
        </tr>
        @foreach ($reciclagens as $reciclagem)
        <tr>
          <td>{{$reciclagem->id}}</td>
          <td>{{$reciclagem->idUser}}</td>
          <td>{{$reciclagem->idBeneficiario}}</td>
          <td>{{$reciclagem->created_at}}</td>
          <td>
            <a href="{{route('reciclagens.edit', $reciclagem->id)}}" class="actions edit">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('reciclagens.show', $reciclagem->id)}}" class="actions delete">
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>

          </td>
        </tr>
        @endforeach
      </table>
      <hr>
      {!! $reciclagens->links() !!}
    </div>

  @endsection
