@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Tipo de marcação: {{ $tipo->tipo }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Cargo:</strong> {{ $tipo->tipo }}</p>

            <form action="{{ route('tipos-marcacao.destroy', $tipo->uuid) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir o tipo <strong>{{ $tipo->tipo }}</strong></button>
            </form>

        </div>
    </div>

@endsection
