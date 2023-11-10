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
                    @if($checkPermissao('usuarios') && $checkLer('usuarios'))
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="spur-card-title"> Informações do Perfil </div>
                            </div>

                            <div class="card-body ">
                                <form method="post" action="{{ route('usuarios.atualizar') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $usuario->id}}" />
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome completo" value="{{ old('name', $usuario->name) }}" required autofocus autocomplete="name">
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="username">Nome de Usuário</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Seu nome de usuário" value="{{ old('username', $usuario->username) }}" required autofocus autocomplete="username">
                                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                                        </div>
                                    </div>
                                    @if($userAtual->type == 0)
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="type">Tipo de Usuário</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="0" @if($usuario->type == 0) selected @endif>Admin</option>
                                                <option value="1" @if($usuario->type == 1) selected @endif>Usuário</option>
                                            </select>                                        
                                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Seu endereço de e-mail. Se você alterar um novo e-mail de confirmação será enviado." value="{{ old('email', $usuario->email) }}" required autofocus autocomplete="email">
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        
                                                @if ($usuario instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $usuario->hasVerifiedEmail())
                                                <div>
                                                    <p class="text-sm mt-2 text-gray-800">
                                                        {{ __('Your email address is unverified.') }}
                                
                                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>
                                                    </p>
                                
                                                    @if (session('status') === 'verification-link-sent')
                                                        <p class="mt-2 font-medium text-sm text-green-600">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if($checkEditar('usuarios'))
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
