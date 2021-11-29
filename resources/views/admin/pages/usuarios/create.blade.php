@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Usuário</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.usuarios._partials.form')
            </form>
        </div>
    </div>

@stop
