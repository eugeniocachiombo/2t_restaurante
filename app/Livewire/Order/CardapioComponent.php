<?php

namespace App\Livewire\Order;

use App\Models\Dish;
use App\Models\Drink;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Overtrue\LaravelShoppingCart\Cart;

class CardapioComponent extends Component
{
    public $perPageDish = 6;
    public $perPageDrink = 6;
    public $tab;

    public function mount()
    {
        $this->tab = "dish-tab";
    }

    public function render()
    {
        return view('livewire.order.cardapio-component', [
            "dishes" => Dish::where("status", "DISPONÍVEL")->paginate($this->perPageDish),
            "drinks" => Drink::where("status", "DISPONÍVEL")->paginate($this->perPageDrink),
        ]);
    }

    public function set_tab($tab){
        $this->tab = $tab;
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

    public function addDishToCart($dish_id)
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

    public function addDrinkToCart($dish_id)
    {
        try {
            $drink = Drink::find($dish_id);
            $priceFinal = $drink->price - ($drink->price * $drink->discount) / 100;
            $count = app(Cart::class)->count();
            app(Cart::class)->add($count+1, $drink->description, 1, $priceFinal, [
                "user_id" => Auth::user()->id,
                "dish_id" => '',
                "drink_id" => $drink->id
            ]);
            $this->dispatch('alerta', [
                'toast' => true,
                'btn' => true,
                'html' => '<b>'.$drink->description . '</b> foi adicionado ao carrinho',
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
