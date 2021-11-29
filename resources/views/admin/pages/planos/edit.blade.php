@extends('layouts.app')

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <h1>Editar Categoria: <strong>{{ $plano->plano }}</strong></h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('planos.update', $plano->id) }}" method="post" class="form">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="form-group">
                    <label for="plano">Plano</label>
                    <input type="text" class="form-control" id="plano" name="plano" placeholder="Informe a plano" required value="{{ $plano->plano ?? old('plano') }}">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Informe a descrição" value="{{ $plano->descricao ?? old('descricao') }}">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="dinheiro form-control" id="preco" name="preco" placeholder="Informe o preço" value="{{ number_format($plano->preco, 2, ',', '.') ?? old('preco') }}">
                </div>

                <div class="form-group">
                    <label for="stripe_id">StripeID</label>
                    <input type="text" class="form-control" id="stripe_id" name="stripe_id" placeholder="Informe o ID" value="{{ $plano->stripe_id ?? old('stripe_id') }}">
                </div>
                <div class="form-group">
                    <label for="cobranca">Cobrança</label>
                    <select name="cobranca" id="cobranca" class="form-control">
                        <option value="Mensal"@if($plano->cobranca == 'Mensal') selected @endif>Mensal</option>
                        <option value="Anual"@if($plano->cobranca == 'Anual') selected @endif>Anual</option>
                    </select>
                </div>
                <br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="1" name="recomendado" id="recomendado" @if($plano->recomendado) checked @endif><label class="form-check-label" for="recomendado">Recomendado</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
                </div>

                @section('scripts')
                    <script src="{{ asset('js/upgest.js') }}"></script>
                @endsection

            </form>
        </div>
    </div>
@endsection
