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
    public $orderType = null;
    public $address;
    public $deliveryFee = 0;

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

    public function setOrderType($type)
    {
        $this->orderType = $type;
        $this->calculateDeliveryFee();
    }

    public function unsetOrderType()
    {
        $this->orderType = null;
        $this->address = null;
    }

    public function updatedAddress()
    {
        $this->calculateDeliveryFee();
    }

    public function calculateDeliveryFee()
    {
        if ($this->orderType === 'online') {
            if (strtolower($this->address) === 'golf 2 projecto nova vida') {
                $this->deliveryFee = 1000;
            } else {
                $this->deliveryFee = 2000;
            }
        } else {
            $this->deliveryFee = 0;
        }
    }

    public function confirmOrderType()
    {
        if ($this->orderType === 'online') {
            $this->validate(
                ["address" => "required"],
                ["address.required" => "Campo Obrigatório"]
            );
        }
        $this->dispatch('close_order_type_modal');
    }


    public function makeOrder()
    {
        if (!$this->orderType) {
            $this->dispatch('open_order_type_modal');
            return;
        }

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
                'type' => strtoupper($this->orderType),
                'delivery_tax' => $this->deliveryFee,
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

            $this->unsetOrderType();
            $this->dispatch('close_modal');
            $generatepdf = new Order();
            return $generatepdf->generatePdf($order->id);
        } catch (\Exception $th) {
            DB::rollBack();
            dd($th->getMessage());
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
