@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">{{ $pageTitle }}</h1>
                    <div class="container-fluid">
                        <div class="row dash-row">
                            <div class="col-xl-4">
                                <div class="stats stats-primary">
                                    <h3 class="stats-title"> <a href="{{ route('usuarios') }}" style="text-decoration: none; color: white;">Usuários</a> </h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="stats-data">
                                            <div class="stats-number">{{ count($usuarios) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="stats stats-success ">
                                    <h3 class="stats-title"> <a href="{{ route('categorias') }}" style="text-decoration: none; color: white;">Categorias</a> </h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                        <div class="stats-data">
                                            <div class="stats-number">{{ count($categorias) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="stats stats-danger">
                                    <h3 class="stats-title"> <a href="{{ route('produtos') }}" style="text-decoration: none; color: white;">Produtos</a> </h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-cube"></i>
                                        </div>
                                        <div class="stats-data">
                                            <div class="stats-number">{{ count($produtos) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
@include('partials/footer')