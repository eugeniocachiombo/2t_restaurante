<?php

namespace App\Livewire\Test;

use Livewire\Component;

class Test extends Component
{
    public $values = [];
    public $inputs = [], 
    $i = 0;

    protected $rules = [
        "values.*" => "required"
    ];
    
    protected $messages = [
        'values.*.required' => 'Obrigatório',
    ];

    public function mount(){
        $this->add();
    }

    public function render()
    {
        return view('livewire.test.test')
        ->layout("components.layouts.app");
    }

    public function add(){
        $this->values[$this->i] = "";
        $this->i += 1;
        array_push($this->inputs, $this->i);
    }

    public function submit(){
        $this->validate($this->rules, $this->messages);
       // dd($this->values);
    }
}
