@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Permissões</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento das <strong>permissões</strong> cadastradas</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('permissoes.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Permissão">Cadastrar Permissão</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de permissões</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Permissão</th>
                                    <th scope="col" width="300px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissoes as $permissao)
                                    <tr>
                                        <th scope="row">{{ $permissao->permissao }}</th>
                                        <td>
                                            <a href="{{ route('permissoes.perfis', $permissao->uuid) }}" class="btn btn-warning"><i class="fa fa-lock"></i></a>
                                            <a href="{{ route('permissoes.show', $permissao->uuid) }}" class="btn btn-info" title="Ver"><i class="batch-icon batch-icon-eye"></i></a>
                                            <a href="{{ route('permissoes.edit', $permissao->uuid) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(isset($filtros))
                        {!! $permissoes->appends($filtros) !!}
                    @else
                        {!! $permissoes->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
