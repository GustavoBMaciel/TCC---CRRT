@extends('layouts.app')
@section('content')

<div class="container">

  <div class="panel-heading">Emprestimo codigo: {{$emprestimoShow->id}}</div>

  <table  class="table table-striped">
    <p><b>ID:</b> {{$emprestimoShow->id}}</p>
    <p><b>Usuario:</b> {{$emprestimoShow->idUser}}</p>
    <p><b>Beneficiario:</b> {{$emprestimoShow->idBeneficiario}}</p>
    <p><b>Materiais:</b> {{$idProdutosEmp}}</p>

  </table>
  <a href="{{route('emprestimos.index')}}" class="btn btn-success">Voltar</a>

  <hr>
  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  {!! Form::open(['route' => ['emprestimos.destroy', $emprestimoShow->id], 'method' => 'DELETE']) !!}
  {!! Form::submit("Deletar Emprestimo: $emprestimoShow->id", ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
</div>
@endsection
