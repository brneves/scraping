@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Plano</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('planos.store') }}" method="post" class="form">
                @csrf
                @include('admin.pages.planos._partials.form')
            </form>
        </div>
    </div>
@endsection
