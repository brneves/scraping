@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="servico">Serviço</label>
    <input type="text" class="form-control" id="servico" name="servico" placeholder="Informe o serviço" required value="{{ $servico->servico ?? old('servico') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>
