@extends('layout.template')
@section('title', 'Atualização de Cômodo')
@section('menu')
    @include('usuario.menu')
@endsection
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Atualização de <strong>Cômodo</strong>
            </div>
            <form action="{{ route('rooms.update', $room->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Nome</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" value="{{ $room->name }}" class="form-control">
                        </div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                    <!-- SUBSTITUIR O VALUE DO CAMPO HIDDEN PELO ID DO USUÁRIO LOGADO -->
                </div>
                <div class="card-footer">
                    <input type="submit" name="btnAtualizar" class="btn btn-success btn-sm" value="Atualizar">
                    <input type="reset" class="btn btn-danger btn-sm" value="Limpar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('conteudo')