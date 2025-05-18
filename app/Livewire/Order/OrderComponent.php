<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderComponent extends Component
{
    public $edit;
    
    public function render()
    {
        return view('livewire.order.order-component', [
            'orders' => Order::where("customer_user_id", Auth::user()->id)->get(),
        ])->layout('components.layouts.app'); 
    }
}
