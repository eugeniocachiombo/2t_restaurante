<?php

namespace App\Livewire\Order;

use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Overtrue\LaravelShoppingCart\Cart;

class MakeOrderComponent extends Component
{

    public $perPage = 6;

    public function render()
    {
        return view('livewire.order.make-order-component', [
            "cartQt" => app(Cart::class)->count(),
            "cartTotal" => app(Cart::class)->total(),
            "dishes" => Dish::where("status", "DISPONÍVEL")->paginate($this->perPage),
        ])
            ->layout('components.layouts.app');
    }

    public function importantMethods()
    {

        /*
    Cart::all()
    Cart::total(); // Ex: 59.80
    Cart::count(); // Ex: 5
    Cart::remove(1); // ID do item (não rowId)
    Cart::clean();
    $item = Cart::get(1); // retorna objeto do item
    $items = Cart::items();*/

    }

    public function addToCart($dish_id)
    {
        try {
            $dish = Dish::find($dish_id);
            $priceFinal = $dish->price - ($dish->price * $dish->discount) / 100;
            $count = app(Cart::class)->count();
            app(Cart::class)->add($count+1, $dish->description, 1, $priceFinal, [
                "user_id" => Auth::user()->id,
                "dish_id" => $dish->id,
                "drink_id" => ''
            ]);
            $this->dispatch('alerta', [
                'toast' => true,
                'btn' => true,
                'html' => '<b>'.$dish->description . '</b> foi adicionado ao carrinho',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Falha ao realizar operação',
            ]);
        }
    }
}
