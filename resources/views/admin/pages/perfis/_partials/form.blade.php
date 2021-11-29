@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="perfil">Perfil</label>
    <input type="text" name="perfil" class="form-control" placeholder="Perfil" value="{{ $perfil->perfil ?? old('perfil') }}">
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Informe a descrição" value="{{ $perfil->descricao ?? old('descricao') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>
