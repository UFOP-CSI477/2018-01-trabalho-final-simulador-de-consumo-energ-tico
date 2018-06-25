@extends('layout.template')
@section('title', 'Lista de Distribuidoras')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Cômodos Cadastrados</h2>
            <a href="{{ route('rooms.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Cômodo
            </a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    @foreach($rooms as $r)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ $r->name }}</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table" style="font-size: 13px; text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>Equipamento</th>
                                            <th>Qtd</th>
                                            <th>Potência (W)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Aparelho de som</td>
                                            <td>1</td>
                                            <td>60</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('rooms.show', $r->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Detalhes</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('rooms.edit', $r->id) }}" class="btn btn-info btn-sm" style="width:100%;">Editar</a>
                        </div>
                        <div class="col-md-4">
                            <form method="post" action="{{ route('rooms.destroy', $r->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Excluir" style="width:100%;">
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection('conteudo')


