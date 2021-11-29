@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Alterar Usuário</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('usuarios.update', $usuario->uuid) }}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.usuarios._partials.form')
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>


@stop
