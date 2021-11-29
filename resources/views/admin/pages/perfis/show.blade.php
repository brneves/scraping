@extends('layouts.app')

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <h1>Perfil: {{ $perfil->perfil }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Perfil:</strong> {{ $perfil->perfil }}</p>
            <p><strong>Descrição:</strong> {{ $perfil->descricao }}</p>

            <form action="{{ route('perfis.destroy', $perfil->uuid) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Excluir o perfil <strong>{{ $perfil->perfil }}</strong></button>
            </form>


        </div>
    </div>

@endsection
