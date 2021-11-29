@include('layouts.header')
<div class="right-column sisu">
    <div class="row mx-0">
        <div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark" data-qp-bg-image="bg-image-1.jpg">
            <a class="signin-logo d-sm-block d-md-none" href="#">
                <img src="{{ asset('img/logo-white.png') }}" width="145" height="32.3" alt="{{ env('APP_NAME') }}">
            </a>
            <h1 class="display-4">Entrar</h1>
            <p class="lead mb-5">
                Acesse o sistema para ter o controle da sua empresa
            </p>
        </div>
        <div class="col-md-5 order-md-1 signin-left-column bg-white px-5">
            <a class="signin-logo d-sm-none d-md-block" href="#">
                <img src="{{ asset('img/logo-dark.png') }}" width="145" height="32.3" alt="QuillPro">
            </a>

            @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informe seu e-mail" autofocus>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="keep-signed-in">
                    <label class="custom-control-label" for="keep-signed-in">Mantenha-me conectado</label>
                </div>
                <button type="submit" class="btn btn-primary btn-gradient btn-block">
                    <i class="batch-icon batch-icon-key"></i>
                    Acessar
                </button>
                <hr>
                <p class="text-center">
                    Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se aqui</a>
                </p>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')
