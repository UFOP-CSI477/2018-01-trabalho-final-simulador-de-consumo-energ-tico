@extends('layout.template')
@section('title', 'Área Administrativa')
@section('menu')
    @include('administrativo.menu')
@endsection
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap" style="float: right;">
            <a href="{{ route('distributors.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Adicionar distribuidora de energia
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-lg-12">
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Bem Vindo!</h4>
            <br>
            <p>Esta é a área administrativa do sistema.</p>
            <p>Aqui você poderá adicionar, remover e editar os dados das distribuidoras de energia.</p>
            <p>Os dados que são registrados permitem que o usuário escolha a companhia responsável por fornecer energia para ele para que os cálculos de gasto sejam mais próximos do real.</p>
            <hr>
            <p class="mb-0">Informações sobre onde encontrar os valores atuais estão disponíveis no <a href="http://www.aneel.gov.br/ranking-das-tarifas">site da ANEEL</a>.</p>
        </div>
    </div>
</div>
@endsection('conteudo')