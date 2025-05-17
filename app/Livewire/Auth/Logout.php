<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    
    public function render()
    {
        $this->logout();
        return view('livewire.auth.logout')
        ->layout("components.layouts.auth.app");
    }

    public function logout(){
        Auth::logout();
        cookie("sessao_iniciada", false, 0);
        $this->dispatch('atrazar_redirect', [
            'path' => '/',
            'time' => 3000
        ]);
    }
}
