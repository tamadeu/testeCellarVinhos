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
                    @if($checkPermissao('usuarios') && $checkCriar('usuarios'))

                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="spur-card-title"> Informações do Perfil </div>
                            </div>

                            <div class="card-body ">
                                <form method="post" action="{{ route('usuarios.criar') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome completo" required autofocus autocomplete="name">
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="username">Nome de Usuário</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Seu nome de usuário" required autofocus >
                                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                                        </div>
                                    </div>
                                    @if($userAtual->type == 0)
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="type">Tipo de Usuário</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="">Escolha um tipo de perfil</option>
                                                <option value="0">Admin</option>
                                                <option value="1">Usuário</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Seu endereço de e-mail. Se você alterar um novo e-mail de confirmação será enviado." required autofocus autocomplete="email">
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">Senha</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Sua senha" required autofocus autocomplete="password">
                                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="password_confirmation">Confirmação de Senha</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Sua senha novamente para confirmação" required autofocus autocomplete="password_confirmation">
                                            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                                        </div>
                                    </div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Criar</button>
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
