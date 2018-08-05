@extends('layouts.app')
@section('content')

<div class="container">

  <div class="panel-heading">Movimento para reciclagem codigo: {{$reciclagemShow->id}}</div>

  <table  class="table table-striped">
    <p><b>ID:</b> {{$reciclagemShow->id}}</p>
    <p><b>Usuario:</b> {{$reciclagemShow->idUser}}</p>
    <p><b>Beneficiario:</b> {{$reciclagemShow->idBeneficiario}}</p>
    <p><b>Materiais:</b> {{$idprodutosremp}}</p>

  </table>
  <a href="{{route('reciclagens.index')}}" class="btn btn-success">Voltar</a>
  <hr>
  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  {!! Form::open(['route' => ['reciclagens.destroy', $reciclagemShow->id], 'method' => 'DELETE']) !!}
  {!! Form::submit("Deletar Movimento para Reciclagem: $reciclagemShow->id", ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
</div>
@endsection
