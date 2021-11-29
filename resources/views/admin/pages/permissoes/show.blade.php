@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Permissões: {{ $permissao->permissao }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Permissão:</strong> {{ $permissao->permissao }}</p>
            <p><strong>Descrição:</strong> {{ $permissao->descricao }}</p>

            <form action="{{ route('permissoes.destroy', $permissao->uuid) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir a permissão <strong>{{ $permissao->permissao }}</strong></button>
            </form>


        </div>
    </div>

@endsection
