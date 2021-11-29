@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cargos disponíveis para o usuário {{ $user->name }} <br></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Cargos</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{ route('usuarios.cargos.vincular', $user->uuid) }}" method="POST">
                    @csrf
                    @foreach($cargos as $cargo)
                        <tr>
                            <td>
                                <input type="checkbox" name="cargos[]" value="{{ $cargo->id }}">
                            </td>
                            <td>{{ $cargo->cargo }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="10">
                            @include('admin.includes.alerts')
                            <button type="submit" class="btn btn-primary">Vincular</button>
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @if(isset($filtros))
                {!! $cargos->appends($filtros)->links() !!}
            @else
                {!! $cargos->links() !!}
            @endif
        </div>
    </div>


@stop
