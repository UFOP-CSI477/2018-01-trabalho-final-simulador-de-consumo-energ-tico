@extends('layout.template')
@section('title', 'Dados do usuário')
@section('menu')
    @include('usuario.menu')
@endsection
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Dados cadastrais</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-md-12">
    	<div class="card">
            <div class="card-header">
                <h3 class="pb-2 display-5">{{ $user->name }}</h3>
            </div>
            <div class="card-body card-block">
            	<h4 class="pb-2 display-5">E-mail:</h4>
            	<p>{{ $user->email }}</p>
            	<br>
            	<h4 class="pb-2 display-5">Distribuidora de energia:</h4>
            	<p>{{ $user->distributor->name }}</p>
            </div>
        </div>
        <div class="overview-wrap" style="float: right;">
            <a href="{{ route('user.index') }}" class="au-btn au-btn-icon au-btn--black">
                Voltar
            </a>
        </div>
    </div>
</div>


@endsection('conteudo')