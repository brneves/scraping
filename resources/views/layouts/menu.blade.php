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
<!--
        @can('categorias')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/categorias*')) active @endif" href="{{ route('categorias.index') }}">
                <i class="fas fa-layer-group"></i>
                Categorias
            </a>
        </li>
        @endcan

        @can('produtos')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/produtos*')) active @endif" href="{{ route('produtos.index') }}">
                <i class="fas fa-tshirt"></i>
                Produtos
            </a>
        </li>
        @endcanany

        @can('clientes')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/clientes*')) active @endif" href="{{ route('clientes.index') }}">
                <i class="fas fa-users"></i>
                Clientes
            </a>
        </li>
        @endcan

        @can('vendas')
        <li class="nav-item">
            <a class="nav-link nav-parent @if(request()->is('painel/vendas*')) active @endif" href="#vendas">
                <i class="fas fa-cash-register"></i>
                Vendas
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vendas.index') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('loja.index') }}" target="_blank" class="nav-link">Vender</a>
                </li>
            </ul>
        </li>
        @endcan

        @can('fluxo_caixa')
        <li class="nav-item">
            <a class="nav-link nav-parent @if(request()->is('painel/faturas*')) active @endif" href="#menu-ecommerce">
                <i class="fas fa-hand-holding-usd"></i>
                Fluxo de Caixa
            </a>
            <ul class="nav nav-pills" id="menu-ecommerce">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faturas.index') }}">Painel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faturas.receitas') }}">Receitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faturas.despesa') }}">Despesas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fatura.categoria.index') }}">Categorias</a>
                </li>
            </ul>
        </li>
        @endcan

        @can('usuarios')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/usuarios*')) active @endif" href="{{ route('usuarios.index') }}">
                <i class="fas fa-id-card-alt"></i>
                Usuários
            </a>
        </li>
        @endcan
    </ul>

    <ul class="nav nav-pills flex-column">
        <li>
            <h6 class="nav-header">Configurações</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('formas-pagamento') ? 'active' : ''}}" href="{{ route('tenant.forma-pagamento.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                Formas de Pagamento
            </a>
        </li>

    </ul>

    @canany(['planos', 'perfis', 'cargos', 'permissoes', 'users'])
    <ul class="nav nav-pills flex-column">
        <li>
            <h6 class="nav-header">Administração</h6>
        </li>

        @can('planos')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('planos') ? 'active' : ''}}" href="{{ route('planos.index') }}">
                <i class="fas fa-list-alt"></i>
                Planos
            </a>
        </li>
        @endcan

        @can('perfis')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/perfis*')) active @endif" href="{{ route('perfis.index') }}">
                <i class="fas fa-address-book"></i>
                Perfis
            </a>
        </li>
        @endcan

        @can('cargos')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/cargos*')) active @endif" href="{{ route('cargos.index') }}">
                <i class="fas fa-address-card"></i>
                Cargos
            </a>
        </li>
        @endcan

        @can('permissoes')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/permissoes*')) active @endif" href="{{ route('permissoes.index') }}">
                <i class="fas fa-lock"></i>
                Permissões
            </a>
        </li>
        @endcan

        @can('users')
        <li class="nav-item">
            <a class="nav-link @if(request()->is('painel/usuarios*')) active @endif" href="{{ route('usuarios.index') }}">
                <i class="fas fa-users"></i>
                Usuários
            </a>
        </li>
        @endcan
    </ul>
    @endcanany-->
</nav>
