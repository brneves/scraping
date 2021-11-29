@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Usuários</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>usuários</strong> cadastrados</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-green btn-gradient" title="Cadastrar Usuário">Cadastrar Usuário</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <caption>Lista de usuários</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col">Usuário</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col" width="250px">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <th scope="row">{{ $usuario->name }}</th>
                                            <td>
                                                @if($usuario->foto)
                                                    <img src="{{ asset('storage/' . $usuario->foto) }}" alt="{{ $usuario->name }}" width="44" height="44" id="foto-topo">
                                                @else
                                                    <img src="{{ asset('/images/sem-foto.png') }}" alt="Foto de {{ $usuario->name }}" width="44" height="44">
                                                @endif
                                            </td>
                                            <td>
                                                @forelse($usuario->cargos as $cargo)
                                                    @if(!$loop->last)
                                                        {{ $cargo->cargo . ' - ' }}
                                                    @else
                                                        {{ $cargo->cargo }}
                                                    @endif
                                                @empty
                                                    <div class="alert alert-info">Nenhum cargo selecionado</div>
                                                @endforelse
                                            </td>
                                            <td>
                                                <a href="{{ route('usuarios.cargos', $usuario->uuid) }}" class="btn btn-info" title="Cargos"><i class="batch-icon batch-icon-polaroid"></i></a>
                                                <a href="{{ route('usuarios.show', $usuario->uuid) }}" class="btn btn-info"><i class="batch-icon batch-icon-eye"></i></a>
                                                <a href="{{ route('usuarios.edit', $usuario->uuid) }}" class="btn btn-warning"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
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


@stop
