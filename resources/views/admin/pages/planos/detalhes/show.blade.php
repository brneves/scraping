@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Categorias: {{ $categoria->categoria }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Categoria:</strong> {{ $categoria->categoria }}</p>
            <p><strong>Descrição:</strong> {{ $categoria->descricao }}</p>

            <form action="{{ route('categorias.destroy', $categoria->uuid) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir a categoria <strong>{{ $categoria->categoria }}</strong></button>
            </form>


        </div>
    </div>

@endsection
