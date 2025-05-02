<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function mount(){
        $this->logout();
    }
    
    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function logout(){
        Auth::logout();
        cookie("sessao_iniciada", false, 0);
        $this->dispatch('atrazar_redirect', [
            'path' => '/',
            'time' => 1000
        ]);
    }
}
