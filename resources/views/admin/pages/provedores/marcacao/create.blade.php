@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar marcação</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('marcacao.store', $provedor->id) }}" method="post" class="form">
                @csrf
                @include('admin.pages.provedores.marcacao._partials.form')
            </form>
        </div>
    </div>
@endsection
