@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Detalhe</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalhes.store', $plano->id) }}" method="post" class="form">
                @csrf
                @include('admin.pages.planos.detalhes._partials.form')
            </form>
        </div>
    </div>
@endsection
