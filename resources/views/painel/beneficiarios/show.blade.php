@extends('layouts.app')
@section('content')

<div class="container">

  <div class="panel-heading">{{$beneficiarioShow->nome}}</div>

<table  class="table table-striped">
<p><b>ID:</b> {{$beneficiarioShow->id}}</p>
<p><b>CNPJ:</b> {{$beneficiarioShow->cnpj}}</p>
<p><b>Inscrição Estadual:</b> {{$beneficiarioShow->inscricaoestadual}}</p>
<p><b>Nome:</b> {{$beneficiarioShow->nome}}</p>
<p><b>Telefone:</b> {{$beneficiarioShow->telefone}}</p>
<p><b>Endereço:</b> {{$beneficiarioShow->endereco}}</p>
<p><b>Numero:</b> {{$beneficiarioShow->numero}}</p>
<p><b>Bairro:</b> {{$beneficiarioShow->bairro}}</p>
<p><b>Complemento:</b> {{$beneficiarioShow->complemento}}</p>
<p><b>Status:</b> {{$beneficiarioShow->ativo}}</p>
<p><b>E-Mail:</b> {{$beneficiarioShow->email}}</p>
<p><b>Descrição:</b> {{$beneficiarioShow->descricao}}</p>
<p><b>Assinatura:</b> {{$beneficiarioShow->assinatura}}</p>
</table>
<a href="{{route('beneficiarios.index')}}" class="btn btn-success">Voltar</a>

<hr>
@if( isset ($errors) && count ($errors) > 0 )
<div class="alert alert-danger">
  @foreach( $errors->all() as $error )
  <p>{{$error}} </p>
  @endforeach
</div>
@endif

{!! Form::open(['route' => ['beneficiarios.destroy', $beneficiarioShow->id], 'method' => 'DELETE']) !!}
{!! Form::submit("Deletar Beneficiario: $beneficiarioShow->nome", ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
</div>
@endsection
