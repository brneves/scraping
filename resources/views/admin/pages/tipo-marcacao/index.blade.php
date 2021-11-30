@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Tipos de Marcação</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>tipos de marcação</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('tipos-marcacao.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Cargo">Cadastrar tipo</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de tipos de marcação</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col" width="250px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tipos as $tipo)
                                    <tr>
                                        <th scope="row">{{ $tipo->tipo }}</th>
                                        <td>
                                            <a href="{{ route('tipos-marcacao.show', $tipo->id) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('tipos-marcacao.edit', $tipo->id) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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
