<?php

namespace App\Livewire\Dish;

use App\Models\Dish;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class DishComponent extends Component
{
    use WithFileUploads;

    public $description, $price, $photo, $dish_id;
    public $recipe_id, $quantity, $discount;
    public $edit = false;

    public $recipes;

    protected $rules = [
        'description' => 'required|string|max:255|unique:dishes,description',
        'price' => 'required',
        'photo' => 'nullable|image|max:1024',
        'recipe_id' => 'nullable|exists:recipes,id',
        'quantity' => 'required|integer|min:1',
        'discount' => 'nullable|integer',
    ];

    protected $messages = [
        'description.required' => 'A descrição é obrigatória.',
        'description.unique' => 'Este prato já existe.',
        'description.string' => 'A descrição deve ser um texto.',
        'description.max' => 'A descrição não pode ter mais que 255 caracteres.',

        'price.required' => 'O preço é obrigatório.',

        'photo.image' => 'A foto deve ser uma imagem.',
        'photo.max' => 'A imagem não pode ter mais que 1MB.',

        'recipe_id.exists' => 'A receita selecionada é inválida.',

        'quantity.required' => 'A quantidade é obrigatória.',
        'quantity.integer' => 'A quantidade deve ser um número inteiro.',
        'quantity.min' => 'A quantidade mínima é 1.',

        'discount.integer' => 'O desconto deve ser um número.',
    ];

    public function mount()
    {
        $this->recipes = Recipe::all();
    }

    public function render()
    {
        return view('livewire.dish.dish-component', [
            'dishes' => Dish::all()
        ])->layout("components.layouts.app");
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

            $photoPath = $this->photo ? $this->photo->store('photos', 'public') : null;
            $priceFinal = $this->parseCurrency($this->price);

            Dish::create([
                'description' => $this->description,
                'price' => $priceFinal,
                'photo' => $photoPath,
                'recipe_id' => $this->recipe_id,
                'user_id' => Auth::id(),
                'quantity' => $this->quantity,
                'discount' => $this->discount
            ]);

            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);

            $this->clear();
            $this->dispatch('close_modal');

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function update()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $dish = Dish::findOrFail($this->dish_id);

            if ($this->photo) {
                $photoPath = $this->photo->store('photos', 'public');
                $dish->photo = $photoPath;
            }

            $dish->update([
                'description' => $this->description,
                'price' => $this->parseCurrency($this->price),
                'recipe_id' => $this->recipe_id,
                'quantity' => $this->quantity,
                'discount' => $this->discount
            ]);

            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);

            $this->clear();
            $this->dispatch('close_modal');

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function setData($id)
    {
        try {
            $this->edit = true;
            $dish = Dish::findOrFail($id);

            $this->dish_id = $dish->id;
            $this->description = $dish->description;
            $this->price = number_format($dish->price, 2, ',', '.');
            $this->recipe_id = $dish->recipe_id;
            $this->quantity = $dish->quantity;
            $this->discount = $dish->discount;

        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $dish = Dish::findOrFail($id);
            $dish->delete();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function clear()
    {
        $this->reset([
            'description', 'price', 'photo', 'dish_id',
            'recipe_id', 'quantity', 'discount', 'edit'
        ]);
    }

    private function parseCurrency($value)
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }
}
