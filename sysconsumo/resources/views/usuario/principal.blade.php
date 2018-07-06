@extends('layout.template')
@section('title', 'Área do usuário')
{{-- @section('menu')
    @include('usuario.menu')
@endsection --}}
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Meu consumo energético</h2>
            <button class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Relatório</button>
        </div>
    </div>
</div>


<div class="row m-t-25">
    <div class="col-lg-12">
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Bem Vindo!</h4>
            <br>
            <p>Esta é a área do usuário.</p>
            <p>Aqui você poderá adicionar, remover e editar os dados dos cômodos e gerar relatórios de gastos.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Tarifas das Distribuidoras</h2>
        <div class="overview-item overview-item--c3">
            <div class="au-card-inner">
                <div class="table-responsive">
                    <table class="table table-top-countries">
                        <thead>
                            <tr style="color: #fff; text-align: center;">
                                <th rowspan="2">UF</th>
                                <th rowspan="2">Distribuidora</th>
                                <th colspan="4">Tarifas por bandeira</th>
                            </tr>
                            <tr style="color: #fff; text-align: center;">
                                <th>Verde</th>
                                <th>Amarela</th>
                                <th>Vermelha - Pat1</th>
                                <th>Vermelha - Pat2</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($distributors as $d)
                            <tr style="text-align: center;">
                                <td>{{$d->uf}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->tarifa}} R$/kW</td>
                                <td>{{$d->tarifa  + 0.01 }} R$/kW</td>
                                <td>{{$d->tarifa + 0.03}} R$/kW</td>
                                <td>{{$d->tarifa + 0.05}} R$/kW</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('conteudo')