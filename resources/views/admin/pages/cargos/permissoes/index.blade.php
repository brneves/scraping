@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Permissões do cargo {{ $cargo->cargo }}</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento das <strong>permissões do cargo</strong></p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('cargos.permissoes.disponiveis', $cargo->uuid) }}" class="btn btn-green btn-gradient" title="Nova permissão ao cargo">Nova permissão ao cargo</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de permissões do cargo</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Permissão</th>
                                    <th scope="col" width="80px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissoes as $permissao)
                                    <tr>
                                        <th scope="row">{{ $permissao->descricao }}</th>
                                        <td>
                                            <a href="{{ route('cargos.permissoes.desvincular', [$cargo->uuid, $permissao->uuid]) }}" class="btn btn-danger" title="Desvincular"><i class="batch-icon batch-icon-bin"></i></a>
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
