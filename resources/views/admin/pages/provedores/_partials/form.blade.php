@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="provedor">Provedor</label>
    <input type="text" class="form-control" id="provedor" name="provedor" placeholder="Informe o serviço" required value="{{ $provedor->provedor ?? old('provedor') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>
