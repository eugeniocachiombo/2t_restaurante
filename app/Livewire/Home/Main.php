<?php

namespace App\Livewire\Home;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.home.main', [
            "customers" => User::where("access_id", 5)->get(),
            "orders" => Order::all(),
            "dishes" => Dish::all(),
            "drinks" => Drink::all()
        ])
        ->layout("components.layouts.app");
    }
}
