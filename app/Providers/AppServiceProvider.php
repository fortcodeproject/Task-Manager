<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("usuarioAutenticado", function($user){
            return $user;
        });
        Gate::define("criadorTarefas", function($user){
            return $user->criacao_tarefa == "permitido";
        });
        Gate::define("usuarioNormal", function($user){
            return $user->id_acesso == 2;
        });
        Gate::define("superAdmin", function($user){
            return $user->id_acesso == 1;
        });
    }
}
