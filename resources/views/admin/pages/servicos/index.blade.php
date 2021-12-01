@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Serviços</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>serviços</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('servicos.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Serviço">Cadastrar Serviço</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de serviços</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Serviço</th>
                                    <th scope="col" width="250px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($servicos as $servico)
                                    <tr>
                                        <th scope="row">{{ $servico->servico }}</th>
                                        <td>
                                            <a href="{{ route('servicos.show', $servico->id) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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
