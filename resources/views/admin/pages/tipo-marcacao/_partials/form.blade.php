@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="tipo">Tipo Marcação</label>
    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Informe o tipo" required value="{{ $tipo->tipo ?? old('tipo') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>
