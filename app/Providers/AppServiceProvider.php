<?php

namespace App\Providers;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
use App\Services\ChangeStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Gate::define("motoboy", function ($user) {
            return $user->access_id === 6;
        });

        try {
            ChangeStatus::changeStatusDishes();
            ChangeStatus::changeStatusDrinks();
            ChangeStatus::changeStatusOrders();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
