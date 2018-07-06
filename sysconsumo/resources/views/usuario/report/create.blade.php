@extends('layout.template')
@section('title', 'Criação de Relatório')
@section('conteudo')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Criação de <strong>Relatório</strong>
            </div>
            <form action="{{ route('reports.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_start" class=" form-control-label">Data de inicio</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <input type="date" name="date_start" class="form-control">
                        </div>
                    
                        <div class="col col-md-3">
                            <label for="date_finish" class=" form-control-label">Data de termino</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <input type="date" name="date_finish" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="room" class=" form-control-label">Tipo de relatório</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="room" class="form-control">
                                <option value="0">Todos os cômodos</option>
                                @foreach($rooms as $r)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 col-md-12">
                            <p>Os dados serão coletados conforme estão nos detalhes dos cômodos. Caso os dados lá registrados não correspondam ao que você deseja, você deve primeiro atualizá-los para depois gerar os relatórios.</p>
                            <a href="{{route('rooms.index')}}">Verificar meus dados de cômodos.</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" name="btnGerar" class="btn btn-success btn-sm" value="Gerar Relatórioo">
                    <input type="reset" class="btn btn-danger btn-sm" value="Limpar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('conteudo')