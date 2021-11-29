@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Perfis</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>perfis</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('perfis.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Perfil">Cadastrar Perfil</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de perfis</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Perfil</th>
                                    <th scope="col" width="290px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($perfis as $perfil)
                                    <tr>
                                        <th scope="row">{{ $perfil->perfil }}</th>
                                        <td>
                                            <a href="{{ route('perfis.permissoes', $perfil->uuid) }}" class="btn btn-warning"><i class="fa fa-lock"></i></a>
                                            <a href="{{ route('perfis.planos', $perfil->uuid) }}" class="btn btn-warning"><i class="fas fa-list-alt"></i></a>
                                            <a href="{{ route('perfis.show', $perfil->uuid) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('perfis.edit', $perfil->uuid) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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
