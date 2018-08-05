@extends('layouts.app')

@section('content')
<div class="container">

  <div class="panel-heading">{{$beneficiarioEdit->id or 'Novo'}}</div>


  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  @if(isset ($beneficiarioEdit))
  {!! Form::model($beneficiarioEdit, ['route' => ['beneficiarios.update', $beneficiarioEdit->id ], 'class' => 'form', 'method' => 'put']) !!}
  @else
  {!! Form::open(['route' => 'beneficiarios.store', 'class' => 'form']) !!}
  @endif
  <div class="form-group col-md-6">
    {!! Form::text('cnpj', null, ['class' => 'form-control', 'placeholder' => 'CNPJ:']) !!}
  </div>
  <div class="form-group col-md-2">
    <label>
      {!! Form::checkbox('ativo') !!}
      Ativo?
    </label>
  </div>
  <div class="form-group col-md-12">
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('inscricaoestadual', null, ['class' => 'form-control', 'placeholder' => 'Inscrição Estadual:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Telefone:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => 'Endereço:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('bairro', null, ['class' => 'form-control', 'placeholder' => 'Bairro:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('complemento', null, ['class' => 'form-control', 'placeholder' => 'Complemento:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email:']) !!}
  </div>
  <div class="form-group col-md-6">
    {!! Form::text('assinatura', null, ['class' => 'form-control', 'placeholder' => 'Assinatura:']) !!}
  </div>
  <div class="form-group col-md-12">
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
  </div>
  <div class="form-group col-md-12">
    <a href="{{route('beneficiarios.index')}}" class="btn btn-success">Voltar</a>
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
  </div>
</div>
@endsection
