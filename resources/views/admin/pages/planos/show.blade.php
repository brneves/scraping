@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Categorias: {{ $plano->plano }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Categoria:</strong> {{ $plano->plano }}</p>
            <p><strong>Descrição:</strong> {{ $plano->descricao }}</p>
            <p><strong>Preço:</strong> {{ number_format($plano->preco, 2, ',', '.') }}</p>

            <form action="{{ route('planos.destroy', $plano->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir a plano <strong>{{ $plano->plano }}</strong></button>
            </form>


        </div>
    </div>

@endsection
