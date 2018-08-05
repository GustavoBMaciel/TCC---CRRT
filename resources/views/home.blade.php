@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Menu Inicial</div>
        <table  class="table table-responsive">
          <td >
            <a href="{{route('produtos.index')}}" class="btn btn-success btn-group-justified edit"><span class="glyphicon glyphicon-th-large"> Materiais</span></a>
          </td>
          <td >
            <a href="{{route('beneficiarios.index')}}" class="btn btn-success btn-group-justified edit"><span class="glyphicon glyphicon-th-large"> Beneficiarios</span></a>
          </td>
          <td >
            <a href="{{route('emprestimos.index')}}" class="btn btn-success btn-group-justified edit"><span class="glyphicon glyphicon-th-large"> Emprestimos</span></a>
          </td>
          <td >
            <a href="{{route('reciclagens.index')}}" class="btn btn-success btn-group-justified edit"><span class="glyphicon glyphicon-th-large"> Reciclagens</span></a>
          </td>
        </table>
      </div>
      @if(Session::has('message'))
          <div class="alert alert-danger">
              {{ Session::get('message') }}
          </div>
      @endif
    </div>
  </div>
</div>
@endsection
