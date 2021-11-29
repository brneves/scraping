@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="cargo">Cargo</label>
    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Informe o cargo" required value="{{ $cargo->cargo ?? old('cargo') }}">
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Informe a descrição" value="{{ $cargo->descricao ?? old('descricao') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>

@section('scripts')
    <script src="{{ asset('js/upgest.js') }}"></script>
@endsection
