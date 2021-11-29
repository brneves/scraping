@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="detalhe">Detalhe</label>
    <input type="text" class="form-control" id="detalhe" name="detalhe" placeholder="Informe a detalhe" required value="{{ $detalhe->detalhe ?? old('detalhe') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>
