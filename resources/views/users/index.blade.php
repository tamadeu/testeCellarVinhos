@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')
            <main class="dash-content">
                <div class="container-fluid">
                    @if($checkPermissao('usuarios') && $checkLer('usuarios'))
                    <h1 class="dash-title">{{ $pageTitle }}</h1>
                    @if($checkCriar('usuarios'))
                        <a href="{{ route('usuarios.novo') }}" class="btn btn-primary mb-1">Criar Novo Usuário</a>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Tipo de Usuário</th>
                                        <th scope="col">Nome de Usuário</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user) 
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ ($user->type == 0) ? "Admin" : "Usuário" }}</td>
                                            <td>{{ '@' . $user->username }}</td>
                                            <td>
                                                @if($checkLer('usuarios'))
                                                    <a href="{{ route('usuarios.editar', ['id' => $user->id])}}" ><i class="fas fa-eye mr-4"></i></a>
                                                @endif
                                                @if($checkExcluir('usuarios'))
                                                <a href="#" data-toggle="modal" data-target="#exampleModal{{ $user->id }}"><i class="fas fa-trash-alt mr-4"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $user->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal{{ $user->id }}Label">Excluir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja excluir o usuário <strong>{{ $user->name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('usuarios.excluir', ['id' => $user->id])}}" class="btn btn-primary">Excluir</a>
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