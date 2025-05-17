<?php

namespace App\Livewire\Ingredient;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IngredientComponent extends Component
{
    public $description, $unit, $category_id, $ingredient_id;
    public $edit = false;

    protected $rules = [
        'description' => 'required|string|max:255',
        'unit' => 'required',
        'category_id' => 'required',
    ];

    protected $messages = [
        'description.required' => 'A descrição é obrigatória.',
        'description.string' => 'A descrição deve ser um texto.',
        'description.max' => 'A descrição não pode ter mais que 255 caracteres.',

        'unit.required' => 'A unidade é obrigatória.',
        'category_id.required' => 'A categoria é obrigatória.',
    ];

    public function render()
    {
        return view('livewire.ingredient.ingredient-component', [
            'ingredients' => Ingredient::all(),
            'categories' => Category::orderBy("description", "asc")->get(),
        ])->layout('components.layouts.app'); 
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

            Ingredient::create([
                'description' => $this->description,
                'unit' => $this->unit,
                'category_id' => $this->category_id,
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
        $this->validate();

        try {
            DB::beginTransaction();

            $ingredient = Ingredient::find($this->ingredient_id);

            $ingredient->update([
                'description' => $this->description,
                'unit' => $this->unit,
                'category_id' => $this->category_id,
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
            $ingredient = Ingredient::find($id);

            $this->ingredient_id = $ingredient->id;
            $this->description = $ingredient->description;
            $this->unit = $ingredient->unit;
            $this->category_id = $ingredient->category_id;

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
            $ingredient = Ingredient::find($id);
            $ingredient->delete();

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
        $this->reset(['description', 'unit', 'ingredient_id', 'edit', 'category_id']);
    }
}
