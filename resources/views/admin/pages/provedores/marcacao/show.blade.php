@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Provedor: {{ $provedor->provedor }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Cargo:</strong> {{ $provedor->provedor }}</p>

            <form action="{{ route('provedores.destroy', $provedor->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir o provedor <strong>{{ $provedor->provedor }}</strong></button>
            </form>

        </div>
    </div>

@endsection
