@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Permissão</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissoes.store') }}" method="post" class="form">
                @csrf
                @include('admin.pages.permissoes._partials.form')
            </form>
        </div>
    </div>
@endsection
