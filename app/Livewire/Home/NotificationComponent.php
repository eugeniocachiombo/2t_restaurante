<?php

namespace App\Livewire\Home;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationComponent extends Component
{
    public $user;

    public function mount(){
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.home.notification-component');
    }
}
