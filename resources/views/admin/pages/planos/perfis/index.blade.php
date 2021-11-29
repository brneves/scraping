@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Perfis do plano {{ $plano->plano }}</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>perfis do plano</strong></p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('planos.perfis.disponiveis', $plano->id) }}" class="btn btn-green btn-gradient" title="Nova permissão ao plano">Novo perfil ao plano</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de perfis do plano</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Perfil</th>
                                    <th scope="col" width="80px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($perfis as $perfil)
                                    <tr>
                                        <th scope="row">{{ $perfil->perfil }}</th>
                                        <td>
                                            <a href="{{ route('planos.perfis.desvincular', [$plano->id, $perfil->id]) }}" class="btn btn-danger" title="Desvincular"><i class="batch-icon batch-icon-bin"></i></a>
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
