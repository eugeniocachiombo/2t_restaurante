<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Help extends Component
{
    public function render()
    {
        return view('livewire.home.help')
        ->layout("components.layouts.app");
    }
}
