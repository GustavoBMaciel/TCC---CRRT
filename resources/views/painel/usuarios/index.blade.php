@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
<div class="panel-heading">Listagem de Usuarios</div>

<a href="{{ url('/home') }}" class="btn btn-success btn-add">Voltar</a>
<a href="{{ url('/register') }}" class="btn btn-success btn-add"><span class="glyphicon glyphicon-plus "></span>Cadastrar</a>

<table  class="table table-striped">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Data de Cadastro</th>
    <th width="100px">Ações</th>
  </tr>
  @foreach ($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    <td>
      <a href="{{route('usuarios.edit', $user->id)}}" class="actions edit">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>
      <a href="{{route('usuarios.show', $user->id)}}" class="actions delete">
        <span class="glyphicon glyphicon-eye-open"></span>
      </a>
    </td>
  </tr>
  @endforeach
</table>

<hr>

{!! $users->links() !!}

</div>
</div>
@endsection
