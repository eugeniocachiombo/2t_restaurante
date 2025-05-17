<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $edit, $description;

    protected $rules = [
        'description' => "required|string|unique:categories,description",
    ];

    protected $messages = [
        "description.required" => "Obrigatório",
        "description.string" => "Apenas letras",
        'description.unique' => "Este email já existe",
    ];

    public function render()
    {
        return view('livewire.category.category-component', [
            "categories" => Category::all()
        ])
        ->layout("components.layouts.app");
    }

    public function save()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            Category::create([
                "description" => $this->description,
                "user_id" => Auth::user()->id,
            ]);
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso'
            ]);
            DB::commit();
            $this->clear();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Erro ao realizar operação'
            ]);
        }
    }

    public function clear(){
        $this->dispatch("close_modal");
        $this->edit = null;
        $this->description = null;
    }
}
