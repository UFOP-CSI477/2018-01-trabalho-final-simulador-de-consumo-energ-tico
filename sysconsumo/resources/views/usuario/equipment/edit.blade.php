@extends('layout.template')
@section('title', 'Cadastro de Equipamento')
@section('menu')
    @include('usuario.menu')
@endsection
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <p>Alteração de <strong>Equipamento</strong></p>
            </div>
            <form action="{{ route('equipments.update', $equipment->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PATCH')
                
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Nome</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" class="form-control" 
                                   value="{{ $equipment->name }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="amount" class=" form-control-label">Quantidade</label>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-2">
                                <input type="text" id="amount" name="amount" class="form-control" 
                                       value="{{ $equipment->amount }}">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">unidade(s)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="watts" class=" form-control-label">Potência</label>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-2">
                                <input type="text" id="watts" name="watts" placeholder="Potência (W)" class="form-control"
                                       value="{{ $equipment->watts }}">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">W</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="time_use" class=" form-control-label">Tempo de uso</label>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-2">
                                <input type="text" id="time_use" name="time_use" placeholder="Ex: 2h e meia = 2.5" class="form-control" data-mask="00.00" class="form-control"
                                       value="{{ $equipment->time_use }}">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">h/dia</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" id="room_id" name="room_id" class="form-control" value="{{ $equipment->room_id }}">
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