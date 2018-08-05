
@extends('layouts.app')
@section('content')

<div class="container">

  <div class="panel-heading">{{$userShow->name}}</div>

  <table  class="table table-striped">
    <p><b>ID:</b> {{$userShow->id}}</p>
    <p><b>Nome:</b> {{$userShow->name}}</p>
    <p><b>E-Mail:</b> {{$userShow->email}}</p>

  </table>
  <a href="{{route('usuarios.index')}}" class="btn btn-success">Voltar</a>

  <hr>
  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  {!! Form::open(['route' => ['usuarios.destroy', $userShow->id], 'method' => 'DELETE']) !!}
  {!! Form::submit("Deletar Usuario: $userShow->name", ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
</div>
@endsection
