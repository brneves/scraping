@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Planos</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>planos</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('planos.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Plano">Cadastrar Plano</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <caption>Lista de planos</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col">Plano</th>
                                        <th scope="col">Preço</th>
                                        <th scope="col">Inscritos</th>
                                        <th scope="col" width="300px">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($planos as $plano)
                                        <tr>
                                            <th scope="row">{{ $plano->plano }}</th>
                                            <th scope="row">{{ number_format($plano->preco, 2, ',', '.') }}</th>
                                            <td>{{ $plano->tenants->count() }}</td>
                                            <td>
                                                <a href="{{ route('detalhes.index', $plano->id) }}" class="btn btn-primary" title="Detalhes"><i class="batch-icon batch-icon-list-alt "></i></a>
                                                <a href="{{ route('planos.show', $plano->id) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                                <a href="{{ route('planos.edit', $plano->id) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
                                                <a href="{{ route('planos.perfis', ['id' => $plano->id]) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
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
    </div>

@endsection
