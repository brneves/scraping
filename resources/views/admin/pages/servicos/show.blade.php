@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Serviço: {{ $servico->servico }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Cargo:</strong> {{ $servico->servico }}</p>

            <form action="{{ route('servicos.destroy', $servico->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir o serviço <strong>{{ $servico->servico }}</strong></button>
            </form>

        </div>
    </div>

@endsection
