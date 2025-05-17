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
        Gate::define("admin", function ($user) {
            return $user->access_id === 1;
        });
        Gate::define("atendente", function ($user) {
            return $user->access_id === 2;
        });
        Gate::define("supervisor", function ($user) {
            return $user->access_id === 3;
        });
        Gate::define("cozinheiro", function ($user) {
            return $user->access_id === 4;
        });
        Gate::define("cliente", function ($user) {
            return $user->access_id === 5;
        });
    }
}
