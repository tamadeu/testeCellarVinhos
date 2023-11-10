<?php

namespace App\Providers;

use App\Models\Permissao;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class VariaveisGlobaisProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if(Auth::check()) {
                $user = Auth::user();

                $view->with([
                    'user' => $user,
                    'checkPermissao' => function ($modulo) use ($user) {
                        $permissao = Permissao::where(['tipo_usuario' => $user->type, 'modulo' => $modulo, 'habilitado' => 'sim'])->get();
                        if($permissao->count() > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'checkLer' => function ($modulo) use ($user) {
                        $permissao = Permissao::where(['tipo_usuario' => $user->type, 'modulo' => $modulo, 'ler' => 'sim'])->get();
                        if($permissao->count() > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'checkEditar' => function ($modulo) use ($user) {
                        $permissao = Permissao::where(['tipo_usuario' => $user->type, 'modulo' => $modulo, 'editar' => 'sim'])->get();
                        if($permissao->count() > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'checkCriar' => function ($modulo) use ($user) {
                        $permissao = Permissao::where(['tipo_usuario' => $user->type, 'modulo' => $modulo, 'criar' => 'sim'])->get();
                        if($permissao->count() > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'checkExcluir' => function ($modulo) use ($user) {
                        $permissao = Permissao::where(['tipo_usuario' => $user->type, 'modulo' => $modulo, 'excluir' => 'sim'])->get();
                        if($permissao->count() > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                ]);
            };
        });
    }
}
