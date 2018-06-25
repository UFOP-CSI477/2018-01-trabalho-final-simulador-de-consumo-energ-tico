@extends('layout.template')
@section('title', 'Lista de Distribuidoras')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Distribuidoras Cadastradas</h2>
            <a href="{{ route('distributors.create') }}" class="au-btn au-btn-icon au-btn--black">
                <i class="zmdi zmdi-plus"></i>Distribuidora de energia
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
                        <th>ID</th>
                        <th>Nome</th>
                        <th>UF</th>
                        <th>Tarifa</th>
                        <th style="padding: 22px 22px;text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distributors as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->uf }}</td>
                        <td>{{ $d->tarifa }}</td>
                        <td style="padding:12px 22px;text-align:center;">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('distributors.show', $d->id) }}" class="btn btn-primary btn-sm" style="width:100%;">Detalhes</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('distributors.edit', $d->id) }}" class="btn btn-info btn-sm" style="width:100%;">Editar</a>
                                </div>
                                <div class="col-md-4">
                                    <form method="post" action="{{ route('distributors.destroy', $d->id) }}">
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