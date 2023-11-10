<div class="card spur-card">
    <div class="card-header">
        <div class="spur-card-icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <div class="spur-card-title"> Alterar Senha </div>
    </div>
    <div class="card-body ">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="current_password">Senha Atual</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Sua senha atual" required autocomplete="current_password">
                    <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Nova Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua nova senha" required autocomplete="password">
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Repita a Nova Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Digite sua nova senha novamente" required autofocus autocomplete="password_confirmation">
                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                </div>
            </div>

            @if (session('status') === 'password-updated')
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