@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Planos do perfil <strong>{{ $perfil->perfil }}</strong></h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>planos do perfil</strong></p>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de planos do perfil</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Perfil</th>
                                    <th scope="col" width="80px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($planos as $plano)
                                    <tr>
                                        <th scope="row">{{ $plano->plano }}</th>
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
