@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cargos</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>cargos</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('cargos.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Cargo">Cadastrar Cargo</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de cargos</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Cargo</th>
                                    <th scope="col" width="250px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cargos as $cargo)
                                    <tr>
                                        <th scope="row">{{ $cargo->cargo }}</th>
                                        <td>
                                            <a href="{{ route('cargos.permissoes', $cargo->uuid) }}" class="btn btn-primary" title="Detalhes"><i class="batch-icon batch-icon-list-alt "></i></a>
                                            <a href="{{ route('cargos.show', $cargo->uuid) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('cargos.edit', $cargo->uuid) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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
