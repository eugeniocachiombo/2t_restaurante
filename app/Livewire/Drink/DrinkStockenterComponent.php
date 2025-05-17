<?php

namespace App\Livewire\Drink;

use App\Models\Drink;
use App\Models\StockEnter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DrinkStockenterComponent extends Component
{

    public $drink_id, $quantity, $expiration_date, $stkenter_id;
    public $edit = false;

    protected $rules = [
        'drink_id' => 'required',
        'quantity' => 'required|integer',
        'expiration_date' => 'required|date|after:today',
    ];

    protected $messages = [
        'drink_id.required' => 'A bebida é obrigatória.',

        'quantity.required' => 'A quantidade é obrigatória.',
        'quantity.integer' => 'Somente número inteiro.',

        'expiration_date.required' => 'A data de expiração é obrigatória.',
        'expiration_date.date' => 'A data de expiração deve ser uma data válida.',
        'expiration_date.after' => 'A data de expiração deve ser no futuro.',
    ];

    public function render()
    {
        return view('livewire.drink.drink-stockenter-component', [
            "stockenters" => StockEnter::whereNull("dish_id")->get(),
            "drinks" => Drink::orderBy("description", "asc")->get()
        ])
        ->layout("components.layouts.app");
    }

    public function submit(){
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

            StockEnter::create([
                'drink_id' => $this->drink_id,
                'quantity' => $this->quantity,
                'expiration_date' => $this->expiration_date,
                'user_id' => Auth::user()->id,
            ]);

            $drink = Drink::find($this->drink_id);
            $drink->quantity += $this->quantity;
            $drink->save();
            DB::commit();
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação Realizada Com Sucesso',
            ]);

            $this->clear();
            $this->dispatch('close_modal');

        } catch (\Throwable $th) {
            DB::rollBack();

            // Para debug: dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Falha ao realizar operação',
            ]);
        }
    }

    public function update()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $drink = StockEnter::findOrFail($this->drink_id);

            if ($this->photo) {
                $photoPath = $this->photo->store('photos', 'public');
                $drink->photo = $photoPath;
            }

            $drink->update([
                'drink_id' => $this->drink_id,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'expiration_date' => $this->expiration_date,
            ]);

            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação Realizada Com Sucesso',
            ]);

            $this->clear();
            $this->dispatch('close_modal');

        } catch (\Throwable $th) {
            DB::rollBack();
           // dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Falha ao realizar operação',
            ]);
        }
    }

    public function setData($id)
    {
        try {
            $this->edit = true;
            $stkenter = StockEnter::find($id);
            $this->stkenter_id = $id;
            $this->drink_id = $stkenter->drink_id;
            $this->quantity = $stkenter->quantity;
            $this->expiration_date = $stkenter->expiration_date;
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Falha ao realizar operação',
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $stkenter = StockEnter::find($id);
            $stkenter->delete();
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação Realizada Com Sucesso',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Falha ao realizar operação',
            ]);
        }
    }

    public function clear()
    {
        $this->reset([
            'drink_id', 'quantity',
            'expiration_date', 'edit',
            'stkenter_id',
        ]);
    }
}
