<?php

namespace App\Livewire\Order;

use App\Models\Dish;
use App\Models\Drink;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Overtrue\LaravelShoppingCart\Cart;

class MakeOrderComponent extends Component
{

    public function render()
    {
        return view('livewire.order.make-order-component', [
            "cartQt" => app(Cart::class)->count(),
            "cartTotal" => app(Cart::class)->total(),
        ])->layout('components.layouts.app');
    }

    
}
