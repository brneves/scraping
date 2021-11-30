@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar tipo de marcação</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tipos-marcacao.store') }}" method="post" class="form">
                @csrf
                @include('admin.pages.tipo-marcacao._partials.form')
            </form>
        </div>
    </div>
@endsection
