@extends('layouts.app')

@section('content')
<div class="container">

  <div class="panel-heading">{{$produtoEdit->id or 'Novo'}}</div>


  @if( isset ($errors) && count ($errors) > 0 )
  <div class="alert alert-danger">
    @foreach( $errors->all() as $error )
    <p>{{$error}} </p>
    @endforeach
  </div>
  @endif

  @if(isset ($produtoEdit))
  {!! Form::model($produtoEdit, ['route' => ['produtos.update', $produtoEdit->id ], 'enctype' => 'multipart/form-data', 'class' => 'form', 'method' => 'put']) !!}
  @else
  {!! Form::open(['route' => 'produtos.store', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
  @endif
  <div class="form-group">
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
  </div>
  <div class="form-group">
    {!! Form::file('imagem', null, ['class' => 'form-control', 'placeholder' => 'Imagem:']) !!}
  </div>
  <div class="form-group">
    <label>
      {!! Form::checkbox('ativo') !!}
      Ativo?
    </label>
  </div>
  <div class="form-group">
    {!! Form::text('quantidade', null, ['class' => 'form-control', 'placeholder' => 'Quantidade:']) !!}
  </div>
  <div class="form-group">
    <select name="categoria" class="form-control">
      <option value="">Escolha sua Categoria</option>
      @foreach ($categorias as $categoria)
      <option value="{{$categoria}}">{{$categoria}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
  </div>
  <a href="{{route('produtos.index')}}" class="btn btn-success">Voltar</a>
  {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
  {!! Form::close() !!}

</div>
@endsection
