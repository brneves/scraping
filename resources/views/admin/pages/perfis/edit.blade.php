@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar Perfil: <strong>{{ $perfil->perfil }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('perfis.update', $perfil->uuid) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @include('admin.pages.perfis._partials.form')

            </form>
        </div>
    </div>
@endsection
