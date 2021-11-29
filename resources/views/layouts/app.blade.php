@include('layouts.header')
@include('layouts.menu')
<div class="right-column">
    @include('layouts.rcnavbar')
    <main class="main-content p-5" role="main">
        @yield('conteudo')
    </main>
</div>

@include('layouts.footer')
