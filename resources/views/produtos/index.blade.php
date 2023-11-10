@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')
            <main class="dash-content">
                <div class="container-fluid">
                    @if($checkPermissao('produtos') && $checkLer('produtos'))
                    <h1 class="dash-title">{{ $pageTitle }}</h1>
                    @if($checkCriar('produtos'))
                        <a href="{{ route('produtos.novo') }}" class="btn btn-primary mb-1">Criar Novo Produto</a>
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
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $produto) 
                                        <tr>
                                            <th scope="row">{{ $produto->id }}</th>
                                            <td>{{ $produto->nome }}</td>
                                            <td>{{ $categoria($produto->categoria_id)->nome }}</td>
                                            <td>{{ $produto->slug }}</td>
                                            <td>
                                                @if($checkLer('produtos'))
                                                    <a href="{{ route('produtos.editar', ['id' => $produto->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                @endif
                                                @if($checkExcluir('produtos'))
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{ $produto->id }}"><i class="fas fa-trash-alt mr-4"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    
                                        <div class="modal fade" id="exampleModal{{ $produto->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $produto->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal{{ $produto->id }}Label">Excluir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja excluir o produto <strong>{{ $produto->nome }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('produtos.excluir', ['id' => $produto->id])}}" class="btn btn-primary">Excluir</a>
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