<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Error extends Component
{
    public function render()
    {
        return view('livewire.auth.error')
        ->layout("components.layouts.auth.app");
    }
}
