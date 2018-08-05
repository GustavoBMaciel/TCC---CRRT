@extends('layouts.app')

@section('content')
<div class="container">

  <div class="panel-heading">{{$userEdit->id or 'Novo'}}</div>

  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  @if(isset ($userEdit))
  {!! Form::model($userEdit, ['route' => ['usuarios.update', $userEdit->id ], 'class' => 'form', 'method' => 'put']) !!}
  @else
  {!! Form::open(['route' => 'usuarios.store', 'class' => 'form']) !!}
  @endif

  <div class="form-group col-md-12">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email:']) !!}
  </div>
  <div class="form-group col-md-6">
    <input type="password" class="form-control" name="password" placeholder="Senha: ">
  </div>
  <div class="form-group col-md-12">

    <a href="{{route('usuarios.index')}}" class="btn btn-success">Voltar</a>

    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection
