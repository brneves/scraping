@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar Cargo: <strong>{{ $cargo->cargo }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cargos.update', $cargo->uuid) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @include('admin.pages.cargos._partials.form')

            </form>
        </div>
    </div>
@endsection
