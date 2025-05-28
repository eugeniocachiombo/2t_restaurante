<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use Overtrue\LaravelShoppingCart\Cart;

class MakeOrderComponent extends Component
{
    public $cartItems = [];
    public $cartTotal = 0;
    public $cartQt = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function render()
    {
        $this->loadCart();
        return view('livewire.order.make-order-component')
            ->layout('components.layouts.app');
    }

    public function makeOrder()
    {
        $cart = app(Cart::class)->name(Auth::user()->id);
        $items = $cart->all();

        if ($items->isEmpty()) {
            $this->dispatch('alerta', [
                'icon' => 'warning',
                'btn' => true,
                'title' => 'Erro',
                'html' =>  'Carrinho vazio',
            ]);
            return;
        }

        DB::beginTransaction();

        try {
            
            
            $totalQuantity = $cart->count();
            $totalPrice = $cart->total();
            $totalDiscount = $items->sum(fn($item) => ($item->attributes['discount'] ?? 0) * $item->qty);

            
            $order = Order::create([
                'number' => 'Ped' . Str::upper(Str::random(5)),
                'description' => 'Pedido criado pelo sistema',
                'customer_user_id' => Auth::user()->id,
                'type' => 'ONLINE',
                'status' => 'PENDENTE',
                'total_price' => $totalPrice,
                'total_quantity' => $totalQuantity,
                'total_discount' => $totalDiscount,
            ]);

            
            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'dish_id' => $item->dish_id ? $item->dish_id : null,
                    'drink_id' => $item->drink_id  ? $item->drink_id : null,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ]);
            }

            $cart->clean();
            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);

           
            $this->dispatch('close_modal');
        } catch (\Exception $th) {
            DB::rollBack();
            
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function removeItem($id)
    {
        $cart = app(Cart::class)->name(Auth::user()->id);

        $items = $cart->search(['id' => $id]);

        if ($items->isEmpty()) {
            throw new \Exception('Item not found.');
        }
        $rawId = $items->keys()->first();
        $cart->remove($rawId);
    }

    public function updateQty($id, $qty)
    {
        $cart = app(Cart::class)->name(Auth::user()->id);

        $items = $cart->search(['id' => $id]);

        if ($items->isEmpty()) {
            throw new \Exception('Item not found.');
        }

        $rawId = $items->keys()->first();

        $cart->update($rawId, $qty);
    }

    public function clearAll()
    {
        app(Cart::class)->name(Auth::user()->id)->clean();
        $this->dispatch('close_modal');
        $this->dispatch('alerta', [
            'toast' => true,
            'btn' => true,
            'html' => 'Carrinho limpo com sucesso',
        ]);
    }

    public function loadCart()
    {
        $cart = app(Cart::class)->name(Auth::user()->id);

        $this->cartItems = $cart->all();
        $this->cartTotal = $cart->total();
        $this->cartQt = $cart->count();
    }
}
