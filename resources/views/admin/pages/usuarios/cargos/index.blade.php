@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cargos do usuário <strong>{{ $user->name }}</strong> <br><a href="{{ route('usuarios.cargos.disponiveis', $user->uuid) }}" class="btn btn-green btn-gradient"><i class="fas fa-plus-square"></i> Nova cargo ao usuário</a></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Cargos</th>
                    <th width="50px">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cargos as $cargo)
                    <tr>
                        <td>{{ $cargo->cargo }}</td>
                        <td>
                            <a href="{{ route('usuarios.cargos.desvincular', [$user->uuid, $cargo->uuid, ]) }}" class="btn btn-danger"><i class="batch-icon batch-icon-bin"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop
