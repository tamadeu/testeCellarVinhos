<div class="card spur-card">
    <div class="card-header">
        <div class="spur-card-icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <div class="spur-card-title"> Informações do Perfil </div>
    </div>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <div class="card-body ">
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome completo" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username">Nome de Usuário</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Seu nome de usuário" value="{{ old('username', $user->username) }}" required autofocus autocomplete="username">
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu endereço de e-mail. Se você alterar um novo e-mail de confirmação será enviado." value="{{ old('email', $user->email) }}" required autofocus autocomplete="email">
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
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
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>