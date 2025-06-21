<?php

namespace App\Services;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
use Illuminate\Support\Facades\Schema;

class ChangeStatus
{
    public static function changeStatusDishes()
    {
        if (Schema::hasTable("dishes")) {
            foreach (Dish::all() as $key => $item) {
                if ($item->quantity == 0) {
                    $item->status = 'INDISPONIVEL';
                    $item->save();
                } else if ($item->quantity >= 0) {
                    $item->status = 'DISPONIVEL';
                    $item->save();
                }
            }
        }
    }

    public static function changeStatusDrinks()
    {
        if (Schema::hasTable("drinks")) {
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
    }

    public static function changeStatusOrders()
    {
        if (Schema::hasTable("orders")) {
            foreach (Order::all() as $key => $item) {
                /* if ($item->invoice) {
                    $item->status = 'PAGO';
                    $item->save();
                } */
            }
        }
    }
}
