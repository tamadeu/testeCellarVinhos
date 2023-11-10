@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if($checkPermissao('permissoes') && $checkLer('permissoes'))
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="spur-card-title"> Informações da Permissão </div>
                            </div>

                            <div class="card-body ">
                                <form method="post" action="{{ route('permissoes.atualizar') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $permissao->id}}" />
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="habilitado">Habilitado</label>
                                            <select class="form-control" id="habilitado" name="habilitado" required>
                                                <option value="">Escolha</option>
                                                <option value="sim" @if($permissao->habilitado == "sim") selected @endif>Sim</option>
                                                <option value="nao" @if($permissao->habilitado == "nao") selected @endif>Não</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('habilitado')" />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="tipo_usuario">Tipo de Usuário</label>
                                            <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                                                <option value="">Escolha um tipo de perfil</option>
                                                <option value="0" @if($permissao->tipo_usuario == "0") selected @endif>Admin</option>
                                                <option value="1" @if($permissao->tipo_usuario == "1") selected @endif>Usuário</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('tipo_usuario')" />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="modulo">Módulo</label>
                                            <select class="form-control" id="modulo" name="modulo" required>
                                                <option value="">Escolha um tipo de perfil</option>
                                                <option value="categorias" @if($permissao->modulo == "categorias") selected @endif>Categorias</option>
                                                <option value="permissoes" @if($permissao->modulo == "permissoes") selected @endif>Permissões</option>
                                                <option value="produtos" @if($permissao->modulo == "produtos") selected @endif>Produtos</option>
                                                <option value="usuarios" @if($permissao->modulo == "usuarios") selected @endif>Usuários</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('modulo')" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="ler">Ler</label>
                                            <select class="form-control" id="ler" name="ler" required>
                                                <option value="">Escolha</option>
                                                <option value="sim" @if($permissao->ler == "sim") selected @endif>Sim</option>
                                                <option value="nao" @if($permissao->ler == "nao") selected @endif>Não</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('ler')" />
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="criar">Criar</label>
                                            <select class="form-control" id="criar" name="criar" required>
                                                <option value="">Escolha</option>
                                                <option value="sim" @if($permissao->criar == "sim") selected @endif>Sim</option>
                                                <option value="nao" @if($permissao->criar == "nao") selected @endif>Não</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('criar')" />
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="editar">Editar</label>
                                            <select class="form-control" id="editar" name="editar" required>
                                                <option value="">Escolha</option>
                                                <option value="sim" @if($permissao->editar == "sim") selected @endif>Sim</option>
                                                <option value="nao" @if($permissao->editar == "nao") selected @endif>Não</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('editar')" />
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="excluir">Excluir</label>
                                            <select class="form-control" id="excluir" name="excluir" required>
                                                <option value="">Escolha</option>
                                                <option value="sim" @if($permissao->excluir == "sim") selected @endif>Sim</option>
                                                <option value="nao" @if($permissao->excluir == "nao") selected @endif>Não</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('excluir')" />
                                        </div>
                                    </div>
                                    
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if($checkEditar('permissoes'))
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @else

                        <h1 class="dash-title">Você não tem acesso a este módulo</h1>
                        <a href="#" onclick="history.back()" class="btn btn-primary mb-1">Voltar</a>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('partials/footer')
