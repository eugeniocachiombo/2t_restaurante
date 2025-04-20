<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.home.main')
        ->layout("components.layouts.app");
    }
}
