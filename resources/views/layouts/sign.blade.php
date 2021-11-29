@include('layouts.header')
<div class="right-column sisu">
    <div class="row mx-0">
        <div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark" data-qp-bg-image="bg-image-1.jpg">
            @yield('direita')
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

            @yield('formulario')
        </div>
    </div>
</div>
@include('layouts.footer')
