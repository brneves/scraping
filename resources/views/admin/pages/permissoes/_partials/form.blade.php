@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label for="permissao">Nome</label>
    <input type="text" name="permissao" class="form-control" value="{{ $permissao->permissao ?? old('permissao') }}">
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" class="form-control" value="{{ $permissao->descricao ?? old('descricao') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-gradient btn-primary">Enviar</button>
</div>

