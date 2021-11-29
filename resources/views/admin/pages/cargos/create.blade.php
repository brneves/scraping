@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Cadastrar Cargo</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cargos.store') }}" method="post" class="form">
                @csrf
                @include('admin.pages.cargos._partials.form')
            </form>
        </div>
    </div>
@endsection
