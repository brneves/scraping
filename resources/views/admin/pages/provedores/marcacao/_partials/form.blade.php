@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="servico">Serviço</label>
    <select class="form-control" id="servico" name="servico">
        <option selected disabled>Selecione o serviço</option>
        @foreach($servicos as $servico)
            <option value="{{ $servico->id }}">{{ $servico->servico }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="servico">Serviço</label>
    <select class="form-control" id="servico" name="servico">
        <option selected disabled>Selecione o serviço</option>
        @foreach($servicos as $servico)
            <option value="{{ $servico->id }}">{{ $servico->servico }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>
