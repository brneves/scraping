@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar tipo de marcação: <strong>{{ $tipo->tipo }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tipos-marcacao.update', $tipo->uuid) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @include('admin.pages.tipo-marcacao._partials.form')

            </form>
        </div>
    </div>
@endsection
