@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')
            <main class="dash-content">
                <div class="container-fluid">
                    @if($checkPermissao('permissoes') && $checkLer('permissoes'))

                        <h1 class="dash-title">{{ $pageTitle }}</h1>
                        @if($checkCriar('permissoes'))
                            <a href="{{ route('permissoes.novo') }}" class="btn btn-primary mb-1">Criar Nova Permissão</a>
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
                                            <th scope="col">Tipo de Usuário</th>
                                            <th scope="col">Módulo</th>
                                            <th scope="col">Habilitado</th>
                                            <th scope="col">Ler</th>
                                            <th scope="col">Criar</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Excluir</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissoes as $permissao) 
                                            <tr>
                                                <th scope="row">{{ $permissao->id }}</th>
                                                <td>{{ ($permissao->tipo_usuario == 0) ? "Admin" : "Usuário" }}</td>
                                                <td>{{ $permissao->modulo }}</td>
                                                <td>{{ $permissao->habilitado }}</td>
                                                <td>{{ $permissao->ler }}</td>
                                                <td>{{ $permissao->criar }}</td>
                                                <td>{{ $permissao->editar }}</td>
                                                <td>{{ $permissao->excluir }}</td>
                                                <td>
                                                    @if($checkLer('permissoes'))
                                                        <a href="{{ route('permissoes.editar', ['id' => $permissao->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                    @endif
                                                    @if($checkExcluir('permissoes'))
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{ $permissao->id }}"><i class="fas fa-trash-alt mr-4"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $permissao->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $permissao->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal{{ $permissao->id }}Label">Excluir</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tem certeza que deseja excluir a permissão?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a href="{{ route('permissoes.excluir', ['id' => $permissao->id])}}" class="btn btn-primary">Excluir</a>
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
