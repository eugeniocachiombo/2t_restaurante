<?php

namespace App\Providers;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
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

        $this->checkStatus();
        $this->checkStatusOrder();
    }

    public function checkStatus(){
       try {
         if (Schema::hasTable("dishes") && Schema::hasTable("drinks")) {

            foreach (Dish::all() as $key => $item) {
                if ($item->quantity == 0) {
                    $item->status = 'INDISPONIVEL';
                    $item->save();
                } else if ($item->quantity >= 0) {
                    $item->status = 'DISPONIVEL';
                    $item->save();
                }
            }

            foreach (Drink::all() as $key => $item) {
                if ($item->quantity == 0) {
                    $item->status = 'INDISPONIVEL';
                    $item->save();
                } else if ($item->quantity >= 0) {
                    $item->status = 'DISPONIVEL';
                    $item->save();
                }
            }
        }
       } catch (\Throwable $th) {
           // throw $th;
       }
    }

    public function checkStatusOrder(){
       try {
         if (Schema::hasTable("orders")) {

            foreach (Order::all() as $key => $item) {
                if ($item->invoice) {
                    $item->status = 'PAGO';
                    $item->save();
                } 
            }
        }
       } catch (\Throwable $th) {
           // throw $th;
       }
    }
}
