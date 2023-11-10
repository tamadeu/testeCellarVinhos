<header class="dash-toolbar">
    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
    <a href="#!" class="searchbox-toggle">
        <i class="fas fa-search"></i>
    </a>
    <form class="searchbox" method="POST" action="{{ route('pesquisa') }}">
        <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
            @csrf
            <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
            <input type="text" class="searchbox-input" name="termo" placeholder="digite para pesquisar e pressione enter">
    </form>
    <div class="tools">
        <a href="https://github.com/tamadeu/testeCellarVinhos" target="_blank" class="tools-item">
            <i class="fab fa-github"></i>
        </a>
        <div class="dropdown tools-item">
            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                </form>
            </div>
        </div>
    </div>
</header>