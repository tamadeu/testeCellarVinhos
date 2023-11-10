@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">{{ $pageTitle }} - {{ $resultado['termo'] }}</h1>
                    <div class="card spur-card">
                        <div class="card-header">
                            <div class="spur-card-icon">
                                <i class="fas fa-table"></i>
                            </div>
                        </div>
                        <div class="card-body ">
                            <table class="table table-hover table-in-card">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Módulo</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($checkPermissao('usuarios'))
                                        @foreach($resultado['usuarios'] as $usuario) 
                                            <tr>
                                                <th scope="row">{{ $usuario->id }}</th>
                                                <td>{{ $usuario->name }}</td>
                                                <td>Usuários</td>
                                                <td>
                                                    @if($checkLer('usuarios'))
                                                        <a href="{{ route('usuarios.editar', ['id' => $usuario->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    @if($checkPermissao('produtos'))
                                        @foreach($resultado['produtos'] as $produto) 
                                            <tr>
                                                <th scope="row">{{ $produto->id }}</th>
                                                <td>{{ $produto->nome }}</td>
                                                <td>Produtos</td>
                                                <td>
                                                    @if($checkLer('produtos'))
                                                        <a href="{{ route('produtos.editar', ['id' => $produto->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    @if($checkPermissao('categorias'))
                                        @foreach($resultado['categorias'] as $categoria) 
                                            <tr>
                                                <th scope="row">{{ $categoria->id }}</th>
                                                <td>{{ $categoria->nome }}</td>
                                                <td>Categorias</td>
                                                <td>
                                                    @if($checkLer('categorias'))
                                                        <a href="{{ route('categorias.editar', ['id' => $categoria->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@include('partials/footer')