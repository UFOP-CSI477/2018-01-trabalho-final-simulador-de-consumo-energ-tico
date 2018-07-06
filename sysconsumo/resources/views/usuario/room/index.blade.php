@extends('layout.template')
@section('title', 'Lista de Distribuidoras')
{{-- @section('menu')
    @include('usuario.menu')
@endsection --}}
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <table class="table" style="font-size: 13px; text-align: center;">
                            <thead>
                                <tr>
                                    <th>Nome do cômodos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $r)
                                <tr>
                                    <td>{{ $r->name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <a href="{{ route('rooms.show', $r->id) }}" class="btn btn-primary btn-sm" 
                                                    style="width:60%;">Detalhes e Equipamentos</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('rooms.edit', $r->id) }}" class="btn btn-info btn-sm" 
                                                    style="width:100%;">Editar</a>
                                            </div>
                                            <div class="col-md-2">
                                                <form method="post" action="{{ route('rooms.destroy', $r->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-sm" value="Excluir" 
                                                            style="width:100%;">
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
</div>
@endsection('conteudo')


