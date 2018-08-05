@extends('layouts.app')

@section('content')
<div class="container">

  <div class="panel-heading">{{$emprestimoEdit->id or 'Novo'}}</div>

  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  @if(isset ($emprestimoEdit))
  {!! Form::model($emprestimoEdit, ['route' => ['emprestimos.update', $emprestimoEdit->id ], 'class' => 'form', 'method' => 'put']) !!}
  @else
  {!! Form::open(['route' => 'emprestimos.store', 'class' => 'form']) !!}
  @endif
  <div class="form-group col-md-12">
      <select name="idUser" class="form-control">
        <option value="">Escolha o Funcionario</option>
        @foreach ($idUsers as $user)
        <option value="{{$user}}">{{$user}}</option>
        @endforeach
      </select>
  </div>
  <div class="form-group col-md-12">
    <select name="idBeneficiario" class="form-control">
      <option value="">Escolha o Beneficiario</option>
      @foreach ($idBeneficiarios as $beneficiario)
      <option value="{{$beneficiario}}">{{$beneficiario}}</option>
      @endforeach
    </select>


  <div name="idProduto" class="panel-heading">{{'Selecione os Materiais'}}</div>
    <table  class="table table-dark">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Categoria</th>
        <th>Selecionar</th>
      </tr>
      @foreach ($idProdutos as $produto)
      <tr>
        <td>{{$produto->id}}</td>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->quantidade}}</td>
        <td>{{$produto->categoria}}</td>
        <td><input type="checkbox" name="idProduto[]"value="{{$produto->id}}"></td>
      </tr>
      @endforeach
    </table>


    <div class="form-group col-md-12">
      <a href="{{route('emprestimos.index')}}" class="btn btn-success">Voltar</a>
      {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection
