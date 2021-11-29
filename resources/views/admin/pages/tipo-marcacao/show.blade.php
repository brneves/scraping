@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Cargo: {{ $cargo->cargo }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Cargo:</strong> {{ $cargo->cargo }}</p>
            <p><strong>Descrição:</strong> {{ $cargo->descricao }}</p>

            <form action="{{ route('cargos.destroy', $cargo->uuid) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir a cargo <strong>{{ $cargo->cargo }}</strong></button>
            </form>


        </div>
    </div>

@endsection
