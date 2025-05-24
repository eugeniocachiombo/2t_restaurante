<?php

namespace App\Livewire\Home;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.home.index', [
            "dishes" => Dish::all(),
            "drinks" => Drink::all(),
            "orders" => Order::all(),
            "cookers" => User::where("access_id", 4)->get(),
        ])
        ->layout("components.layouts.home.app");
    }

}
