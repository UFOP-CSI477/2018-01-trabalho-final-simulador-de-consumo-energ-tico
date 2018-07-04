@extends('layout.template')
@section('title', 'Detalhes do Cômodo')
@section('menu')
    @include('usuario.menu')
@endsection
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Dados cômodo</h2>
            <a href="{{ route('rooms.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Cômodo
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="pb-2 display-5">{{ $room->name }}</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-info btn-sm" style="width:100%;">Editar</a>
                    </div>
                    <div class="col-md-2">
                        <form method="post" action="{{ route('rooms.destroy', $room->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
                        </form>
                    </div>
                </div>                
            </div>
            <div class="card-body card-block">

                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="pb-2 display-5">Consumo do cômodo:</h4>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <p><span name="consumo-total-potencia">{{ $potencia_total->potencia_total }}</span><strong> W</strong></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <p><strong>R$ </strong><span name="consumo-total-dinheiro">107.64</span></p>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-9">
                        <h4 class="pb-2 display-5">Equipamentos cadastrados</h4>
                    </div>
                
                    <div class="col-lg-3">
                        <a href="{{ route('equipments.create_for_room', $room->id) }}" class="au-btn au-btn-icon au-btn--black">
                            <i class="zmdi zmdi-plus"></i>Equipamento
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive" style="overflow: unset;">
                            <table class="table" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Qtd</th>
                                        <th>Potência (W)</th>
                                        <th>Tempo de uso (h/dia)</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($equipments as $e)    
                                    <tr>
                                        <td>{{$e->name}}</td>
                                        <td>{{$e->amount}}</td>
                                        <td>{{$e->watts}}</td>
                                        <td>{{$e->time_use}}</td>
                                        <td>
                                            <div class="row">
                                                <!-- ALTERAR OS LINKS PARA O DOS APARELHOS -->
                                                <div class="col-md-6">
                                                    <a href="{{ route('equipments.edit', $e->id) }}" class="btn btn-info btn-sm" style="width:100%;">Editar</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <form method="post" action="{{ route('equipments.destroy', $e->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                    
        </div>
        <div class="overview-wrap" style="float: right;">
            <a href="{{ route('rooms.index') }}" class="au-btn au-btn-icon au-btn--black">
                Voltar
            </a>
        </div>
    </div>
</div>


@endsection('conteudo')