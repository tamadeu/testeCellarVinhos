@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')
            <main class="dash-content">
                <div class="container-fluid">
                    @if($checkPermissao('categorias') && $checkLer('categorias'))
                    <h1 class="dash-title">{{ $pageTitle }}</h1>
                    @if($checkCriar('categorias'))
                        <a href="{{ route('categorias.novo') }}" class="btn btn-primary mb-1">Criar Nova Categoria</a>
                    @endif
                    <div class="card spur-card">
                        <div class="card-header">
                            <div class="spur-card-icon">
                                <i class="fas fa-table"></i>
                            </div>
                        </div>
                        <div class="card-body ">
                            @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            <table class="table table-hover table-in-card">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorias as $categoria) 
                                        <tr>
                                            <th scope="row">{{ $categoria->id }}</th>
                                            <td>{{ $categoria->nome }}</td>
                                            <td>{{ $categoria->slug }}</td>
                                            <td>
                                                @if($checkLer('categorias'))
                                                    <a href="{{ route('categorias.editar', ['id' => $categoria->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                @endif
                                                @if($checkExcluir('categorias'))
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{ $categoria->id }}"><i class="fas fa-trash-alt mr-4"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $categoria->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal{{ $categoria->id }}Label">Excluir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja excluir a categoria <strong>{{ $categoria->nome }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('categorias.excluir', ['id' => $categoria->id])}}" class="btn btn-primary">Excluir</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                @else

                    <h1 class="dash-title">Você não tem acesso a este módulo</h1>
                    <a href="#" onclick="history.back()" class="btn btn-primary mb-1">Voltar</a>
                    
                @endif
                </div>
            </main>
        </div>
    </div>
@include('partials/footer')