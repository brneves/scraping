@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar Permissão: <strong>{{ $permissao->permissao }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissoes.update', $permissao->uuid) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.permissoes._partials.form')
            </form>
        </div>
    </div>
@endsection
