@extends('layout.template')
@section('title', 'Relatório detalhado')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Relatório detalhado</h2>
            <a href="{{ route('reports.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Relatório
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-lg-12">
        <p><strong>Período de análise:</strong> {{$report->date_start}} &bull; {{$report->date_finish}}</p>
    </div>
</div>

<div class="row m-t-25">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-bordered table-striped table-earning">
                <thead>
                    <tr>
                        <th rowspan="2">Cômodo</th>
                        <th colspan="4" style="text-align: center;">Custo estimado por bandeira (R$)</th>
                    </tr>
                    <tr>
                        <th>Verde</th>
                        <th>Amarela</th>
                        <th>Vermelha - Patamar 1</th>
                        <th>Vermelha - Patamar 2</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($array_bandeiras as $bandeira)
                    <tr style="text-align: center;">
                        <th>{{ $bandeira['comodo'] }}</th>
                        <th>{{ $bandeira['verde'] }}</th>
                        <th>{{ $bandeira['amarela'] }}</th>
                        <th>{{ $bandeira['vermelha1'] }}</th>
                        <th>{{ $bandeira['vermelha2'] }}</th>
                    </tr>
                @endforeach
                <tr style="text-align: center;" class="bg-warning">
                    <th>Total</th>
                    <th>{{ $total['verde'] }}</th>
                    <th>{{ $total['amarela'] }}</th>
                    <th>{{ $total['vermelha1'] }}</th>
                    <th>{{ $total['vermelha2'] }}</th>
                </tr>
                            
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('conteudo')