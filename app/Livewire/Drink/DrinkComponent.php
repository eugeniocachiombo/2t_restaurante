<?php

namespace App\Livewire\Drink;

use App\Models\Drink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;


class DrinkComponent extends Component
{
    use WithFileUploads;

    public $description, $price, $expiration_date, $photo, $drink_id;
    public $edit = false;

    protected $rules = [
        'description' => 'required|string|max:255',
        'price' => 'required',
        'expiration_date' => 'required|date|after:today',
        'photo' => 'nullable|image|max:1024',
    ];

    protected $messages = [
        'description.required' => 'A descrição é obrigatória.',
        'description.string' => 'A descrição deve ser um texto.',
        'description.max' => 'A descrição não pode ter mais que 255 caracteres.',

        'price.required' => 'O preço é obrigatório.',

        'expiration_date.required' => 'A data de expiração é obrigatória.',
        'expiration_date.date' => 'A data de expiração deve ser uma data válida.',
        'expiration_date.after' => 'A data de expiração deve ser no futuro.',

        'photo.image' => 'O arquivo deve ser uma imagem.',
        'photo.max' => 'A imagem não pode ultrapassar 1MB.',
    ];

    public function render()
    {
        return view('livewire.drink.drink-component', [
            "drinks" => Drink::all()
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
            $photoPath = $this->photo ? $this->photo->store('photos', 'public') : null;
            
            $priceRmPoint = str_replace(".", "", $this->price);
            $priceFinal = str_replace(",", ".", $priceRmPoint);

            Drink::create([
                'description' => $this->description,
                'price' => $priceFinal,
                'expiration_date' => $this->expiration_date,
                'photo' => $photoPath,
                'user_id' => Auth::user()->id,
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

            $drink = Drink::findOrFail($this->drink_id);

            if ($this->photo) {
                $photoPath = $this->photo->store('photos', 'public');
                $drink->photo = $photoPath;
            }

            $drink->update([
                'description' => $this->description,
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
            $drink = Drink::find($id);
            $this->drink_id = $id;
            $this->description = $drink->description;
            $this->price = $drink->price;
            $this->expiration_date = $drink->expiration_date;
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
            $drink = Drink::find($id);
            $drink->delete();
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
            'description', 'price', 'expiration_date',
            'photo', 'drink_id', 'edit',
        ]);
    }
    
}
