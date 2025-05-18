<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $edit, $description, $category_id;

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

    public function submit()
    {
        if ($this->edit) {
            $this->update();
        } else {
            $this->save();
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            Category::create([
                'description' => $this->description,
                'user_id' => Auth::user()->id,
            ]);

            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação Realizada com Sucesso',
            ]);

            $this->clear();

        } catch (\Throwable $th) {
            DB::rollBack();
            //dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Erro ao Realizar Operação',
            ]);
        }
    }

    public function update()
    {
        $this->validate([
            'description' => 'required|string|max:255|unique:categories,description,'.$this->category_id,
        ]);

        try {
            DB::beginTransaction();

            $category = Category::find($this->category_id);

            $category->update([
                'description' => $this->description,
            ]);

            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação Realizada com Sucesso',
            ]);

            $this->clear();

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Erro ao Realizar Operação',
            ]);
        }
    }

    public function setData($id)
    {
        try {
            $this->edit = true;
            $category = Category::find($id);

            $this->category_id = $category->id;
            $this->description = $category->description;

        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Erro ao Realizar Operação',
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação Realizada com Sucesso',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Erro ao Realizar Operação',
            ]);
        }
    }

    public function clear()
    {
        $this->reset(['description', 'edit', 'category_id']);
    }
}
