@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar provedor: <strong>{{ $provedor->provedor }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('provedores.update', $provedor->id) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @include('admin.pages.provedores._partials.form')

            </form>
        </div>
    </div>
@endsection
