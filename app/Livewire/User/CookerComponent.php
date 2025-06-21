<?php

namespace App\Livewire\User;


use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CookerComponent extends Component
{
    public $edit = false, $customer_id;
    public $first_name, $last_name, $gender, $birth_date, $nif;
    public $address_id, $email, $phone;

    public $addresses;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|in:MASCULINO,FEMININO',
        'birth_date' => 'required|date',
        'nif' => 'nullable|string|max:20',
        'address_id' => 'nullable|exists:addresses,id',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|digits_between:9,15|unique:users,phone',
    ];

    protected $messages = [
        'first_name.required' => 'O nome é obrigatório.',
        'last_name.required' => 'O sobrenome é obrigatório.',
        'gender.required' => 'O gênero é obrigatório.',
        'birth_date.required' => 'A data de nascimento é obrigatória.',
        'email.required' => 'O email é obrigatório.',
        'email.unique' => 'Este email já está em uso.',
        'phone.required' => 'O telefone é obrigatório.',
        'phone.unique' => 'Este telefone já está em uso.',
    ];

    public function mount()
    {
        $this->addresses = Address::all();
    }

    public function render()
    {
        return view('livewire.user.cooker-component', [
            'users' => User::where('access_id', 4)->get()
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

            User::create([
                'first_name'   => $this->first_name,
                'last_name'    => $this->last_name,
                'gender'       => $this->gender,
                'birth_date'   => $this->birth_date,
                'nif'          => $this->nif,
                'address_id'   => $this->address_id,
                'email'        => $this->email,
                'phone'        => $this->phone,
                'password'     => Hash::make($this->email),
                'access_id'    => 4,
            ]);

            DB::commit();

            $this->resetForm();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação Realizada com Sucesso',
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Falha ao Realizar Operação',
            ]);
        }
    }

    public function setData($id)
    {
        $this->customer_id = $id;
        $this->edit = true;

        $user = User::findOrFail($id);

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->gender = $user->gender;
        $this->birth_date = $user->birth_date;
        $this->nif = $user->nif;
        $this->address_id = $user->address_id;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }


    public function update()
    {
        try {
            $user = User::findOrFail($this->customer_id);

            $this->validate([
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required|numeric|unique:users,phone,' . $user->id,
            ]);

            $user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'nif' => $this->nif,
                'address_id' => $this->address_id,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $this->resetForm();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
                'btn' => true
            ]);

            $this->dispatch('close_modal');
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Falha ao realizar operação',
                'btn' => true
            ]);
        }
    }

    public function delete($id)
    {
        try {
            User::findOrFail($id)->delete();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
                'btn' => true
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Falha ao realizar operação',
                'btn' => true
            ]);
        }
    }


    public function resetForm()
    {
        $this->reset([
            'first_name',
            'last_name',
            'gender',
            'birth_date',
            'nif',
            'address_id',
            'email',
            'phone',
            'edit'
        ]);
    }
}
