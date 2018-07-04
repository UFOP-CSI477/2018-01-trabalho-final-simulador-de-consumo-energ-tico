@extends('layout.template')
@section('title', 'Editar de Distribuidora')
@section('menu')
    @include('administrativo.menu')
@endsection
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Editar <strong>Distribuidora</strong>
            </div>
            <form action="{{ route('distributors.update', $distributor->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PATCH')
                
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Nome</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Nome da distribuidora de energia" class="form-control" value="{{ $distributor->name }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="uf" class=" form-control-label">UF:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="uf" id="uf" class="form-control">
                                <option value="">Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>

                    <script>
                    	$('select[name=uf] option[value={{$distributor->uf}}]').attr('selected','selected');
                	</script>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tarifa" class=" form-control-label">Tarifa</label>
                        </div>

                        <div class="col-12 col-md-9">
                            <div class="input-group">
                                <div class="input-group-addon">R$</div>
                                <input type="text" id="tarifa" name="tarifa" placeholder="Tarifa convencional" class="form-control" value="{{ $distributor->tarifa }}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-12">
                            <small class="help-block form-text">Informações podem ser obtidas no <a href="http://www.aneel.gov.br/ranking-das-tarifas">site da ANEEL</a></small>
                        </div>
                    </div>

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