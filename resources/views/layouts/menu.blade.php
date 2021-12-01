<nav id="sidebar" class="px-0 bg-dark bg-gradient sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="logo-nav-item">
            <a class="navbar-brand" href="#">
                <img src="" width="145" height="32.3" alt="{{ env('APP_NAME') }}">
            </a>
        </li>
        <li>
            <h6 class="nav-header">General</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel')) active @endif" href="{{ route('dashboard') }}">
                <i class="batch-icon batch-icon-star"></i>
                Dashboard
            </a>
        </li>
    </ul>

    <ul class="nav nav-pills flex-column">
        <li>
            <h6 class="nav-header">Apps</h6>
        </li>


        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/provedores*')) active @endif" href="">
                <i class="fas fa-layer-group"></i>
                Provedores
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/servicos*')) active @endif" href="{{ route('servicos.index') }}">
                <i class="fas fa-layer-group"></i>
                Serviços
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/tipos-marcacao*')) active @endif" href="{{ route('tipos-marcacao.index') }}">
                <i class="fas fa-layer-group"></i>
                Tipos de Marcação
            </a>
        </li>




    </ul>
</nav>
