@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Permissões do perfil <strong>{{ $perfil->perfil }}</strong></h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento das <strong>permissões do perfil</strong></p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('perfis.permissoes.disponiveis', $perfil->uuid) }}" class="btn btn-green btn-gradient" title="Nova permissão ao perfil">Nova permissão ao perfil</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de permissões do perfil</caption>
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
                                            <a href="{{ route('perfis.permissoes.desvincular', [$perfil->uuid, $permissao->uuid]) }}" class="btn btn-danger" title="Desvincular"><i class="batch-icon batch-icon-bin"></i></a>
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
