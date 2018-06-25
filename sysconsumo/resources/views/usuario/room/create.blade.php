@extends('layout.template')
@section('title', 'Cadastro de Cômodo')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Cadastro de <strong>Cômodo</strong>
            </div>
            <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Nome</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Nome do cômodo" class="form-control">
                        </div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="1">
                    <!-- SUBSTITUIR O VALUE DO CAMPO HIDDEN PELO ID DO USUÁRIO LOGADO -->
                </div>
                <div class="card-footer">
                    <input type="submit" name="btnCadastrar" class="btn btn-success btn-sm" value="Cadastrar">
                    <input type="reset" class="btn btn-danger btn-sm" value="Limpar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('conteudo')