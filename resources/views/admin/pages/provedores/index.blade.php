@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Provedores</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>provedores</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('provedores.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Provedor">Cadastrar Provedor</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de provedores</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Provedor</th>
                                    <th scope="col" width="250px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($provedores as $provedor)
                                    <tr>
                                        <th scope="row">{{ $provedor->provedor }}</th>
                                        <td>
                                            <a href="##" class="btn btn-primary" title="Marcação"><i class="batch-icon batch-icon-tag"></i></a>
                                            <a href="{{ route('provedores.show', $provedor->id) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('provedores.edit', $provedor->id) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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
