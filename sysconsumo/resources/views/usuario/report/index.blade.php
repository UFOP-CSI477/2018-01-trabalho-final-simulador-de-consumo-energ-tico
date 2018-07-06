@extends('layout.template')
@section('title', 'Relatórios')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Meus relatórios</h2>
            <a href="{{ route('reports.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Relatório
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo de avaliação</th>
                        <th>kW gastos</th>
                        <th style="padding: 22px 22px;text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $r)
                    <tr>
                        <td>{{ $r->date_start }} &bull; {{ $r->date_finish }}</td>
                        <td> @if($r->room == 0)
                                Todos os cômodos
                             @else
                                @foreach($rooms as $room)
                                    @if($room->id == $r->room)
                                        {{ $room->name }}
                                    @endif
                                @endforeach
                             @endif
                         </td>
                        <td>{{ $r->watts }}</td>
                        <td style="padding:12px 22px;text-align:center;">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('reports.show', $r->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Detalhes</a>
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="{{ route('reports.destroy', $r->id) }}">
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
@endsection('conteudo')