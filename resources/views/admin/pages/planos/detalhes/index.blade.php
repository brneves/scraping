@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Detalhes</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <p class="lead">Faça o gerenciamento dos <strong>detalhes</strong> cadastrados no plano <strong>{{ $plano->plano }}</strong></p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('detalhes.create', $plano->id) }}" class="btn btn-green btn-gradient" title="Cadastrar Detalhe">Cadastrar Detalhe</a>
                        </div>

                        <div class="col-md-12 pb-5">
                            <table class="table table-striped">
                                <caption>Lista de detalhes</caption>
                                <thead>
                                <tr>
                                    <th scope="col">Detalhe</th>
                                    <th scope="col" width="200px">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detalhes as $detalhe)
                                    <tr>
                                        <th scope="row">{{ $detalhe->detalhe }}</th>
                                        <td>
                                            <a href="{{ route('detalhes.edit', [$plano->id ,$detalhe->id], ) }}" class="btn btn-warning" title="Editar"><i class="batch-icon batch-icon-compose-alt-2"></i></a>
                                            <div class="btn-group">
                                                <form action="{{ route('detalhes.destroy', [$plano->id ,$detalhe->id] ) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class=" btn btn-danger"><i class="batch-icon batch-icon-bin-alt-2 "></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
