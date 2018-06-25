@extends('layout.template')
@section('title', 'Detalhes da Distribuidora')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Dados cadastrais</h2>
            <a href="{{ route('distributors.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Distribuidora de energia
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-md-12">
    	<div class="card">
            <div class="card-header">
                <h3 class="pb-2 display-5">{{ $distributor->name }}</h3>
            </div>
            <div class="card-body card-block">
            	<h4 class="pb-2 display-5">ID:</h4>
            	<p>{{ $distributor->id }}</p>
            	<br>
            	<h4 class="pb-2 display-5">Tarifa:</h4>
            	<p>{{ $distributor->tarifa }}</p>
            	<br>
            	<h4 class="pb-2 display-5">Atualizado em (horário do servidor):</h4>
            	<p>{{ $distributor->updated_at }}</p>
            </div>
        </div>
        <div class="overview-wrap" style="float: right;">
            <a href="{{ route('distributors.index') }}" class="au-btn au-btn-icon au-btn--black">
                Voltar
            </a>
        </div>
    </div>
</div>


@endsection('conteudo')