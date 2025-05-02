<?php

namespace App\Livewire\Auth;

use App\Models\Access;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Signup extends Component
{

    public $first_name, $last_name, $gender,
    $birth_date, $email, $phone, $password;

    public function render()
    {
        return view('livewire.auth.signup')
            ->layout("components.layouts.auth.app");
    }

    public function save()
    {
        $this->emit('alerta', [
            'icon' => 'success',
            'mensagem' => 'Grupo criado com sucesso'
        ]);
        try {
            DB::beginTransaction();
            $access = Access::where("description", "cliente")->first();
            User::create([
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                'email' => $this->email,
                'password' => $this->password,
                "gender" => $this->gender,
                "birth_date" => $this->birth_date,
                "phone" => $this->phone,
                "password" => Hash::make($this->password),
                "access_id" => $access->id,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage(), $th->getLine());
        }
    }

    public function clear()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->password = null;
        $this->gender = null;
        $this->birth_date = null;
        $this->phone = null;
        $this->password = null;
    }
}
