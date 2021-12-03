@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Marcações do provedor <strong>{{ $provedor->provedor }}</strong></h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento das <strong>marcações</strong> cadastradas</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('marcacao.create', $provedor->id) }}" class="btn btn-green btn-gradient" title="Cadastrar Marcação">Cadastrar Marcação</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de provedores</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Marcação</th>
                                    <th scope="col" width="250px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($provedor->marcacoes as $marcacao)
                                    <tr>
                                        <th scope="row">{{ $marcacao->marcacao }}</th>
                                        <td>
                                            <a href="##" class="btn btn-primary" title="Marcação"><i class="batch-icon batch-icon-tag"></i></a>
                                            <a href="{{ route('marcacao.show', $provedor->id, $marcacao->id) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('marcacao.edit', $provedor->id, $marcacao->id) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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

@endsection
