@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Usuário: {{ $usuario->name }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')


                <p>
                    <strong>Nome: </strong> {{ $usuario->name }}
                </p>
                <p>
                    <strong>URL: </strong> {{ $usuario->email }}
                </p>
                <p>
                    <strong>Empresa: </strong> {{ $usuario->tenant->nome }}
                </p>


            <form action="{{ route('usuarios.destroy', $usuario->uuid) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">DELETAR O USUÁRIO <strong>{{ $usuario->name }}</strong></button>
            </form>

        </div>
    </div>
@stop
