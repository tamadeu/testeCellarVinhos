<nav class="dash-nav-list">
    <a href="{{ route('dashboard') }}" class="dash-nav-item">
        <i class="fas fa-home"></i> Dashboard </a>
    <div class="dash-nav-dropdown @if($pageTitle == "Usuários" || $pageTitle == "Permissões") show @endif">
        <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
            <i class="fas fa-user"></i> Usuários </a>
        <div class="dash-nav-dropdown-menu">
            @if($checkPermissao('usuarios'))
                <a href="{{ route('usuarios') }}" class="dash-nav-dropdown-item">Todos</a>
            @endif

            @if($checkPermissao('permissoes'))
                <a href="{{ route('permissoes') }}" class="dash-nav-dropdown-item">Permissões</a>
            @endif
        </div>
    </div>

    <div class="dash-nav-dropdown @if($pageTitle == "Produtos" || $pageTitle == "Categorias") show @endif">
        <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
            <i class="fas fa-cube"></i> Produtos </a>
        <div class="dash-nav-dropdown-menu">
            @if($checkPermissao('produtos'))
                <a href="{{ route('produtos') }}" class="dash-nav-dropdown-item">Todos</a>
            @endif

            @if($checkPermissao('categorias'))
                <a href="{{ route('categorias') }}" class="dash-nav-dropdown-item">Categorias</a>
            @endif
        </div>
    </div>

</nav>