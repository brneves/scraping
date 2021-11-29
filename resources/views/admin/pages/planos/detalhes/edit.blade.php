@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar Detalhe do plano {{ $plano->plano }}: <strong>{{ $detalhe->detalhe }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalhes.update', [$plano->id, $detalhe->id]) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.planos.detalhes._partials.form')
            </form>
        </div>
    </div>
@endsection
