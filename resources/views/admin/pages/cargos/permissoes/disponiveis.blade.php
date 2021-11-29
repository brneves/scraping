@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Permissões disponíveis para o cargo <strong>{{ $cargo->cargo }}</strong></h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="100px"><input type="checkbox" id="checkTodos" name="checkTodos"> Todos</th>
                            <th>Permissões</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="{{ route('cargos.permissoes.vincular', $cargo->uuid) }}" method="POST">
                            @csrf
                            @foreach($permissoes as $permissao)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="permissoes[]" value="{{ $permissao->id }}">
                                    </td>
                                    <td>{{ $permissao->descricao }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="10">
                                    @include('admin.includes.alerts')
                                    <button type="submit" class="btn btn-primary">Vincular</button>
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $("#checkTodos").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        </script>
    @endsection

@endsection
