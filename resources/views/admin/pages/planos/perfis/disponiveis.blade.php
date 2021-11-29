@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Perfis disponíveis para o plano <strong>{{ $plano->plano }}</strong></h1>
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
                            <th>Perfis</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="{{ route('planos.perfis.vincular', $plano->id) }}" method="POST">
                            @csrf
                            @foreach($perfis as $perfil)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="perfis[]" value="{{ $perfil->id }}">
                                    </td>
                                    <td>{{ $perfil->perfil }}</td>
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
