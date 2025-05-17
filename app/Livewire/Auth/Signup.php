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
    $birth_date, $email, $phone, $password, $confirmpassword;

    protected $rules = [
        "first_name" => "required|string",
        "last_name" => "required|string",
        'email' => "required|email|unique:users,email",
        'password' => "required",
        "gender" => "required",
        "birth_date" => "required",
        "phone" => "required|unique:users,phone",
        "password" => "required",
        'confirmpassword' => "required",
    ];

    protected $messages = [
        "first_name.required" => "Obrigatório",
        "first_name.string" => "Apenas letras",
        "last_name.required" => "Obrigatório",
        "last_name.string" => "Apenas letras",
        'email.required' => "Obrigatório",
        'email.email' => "Apenas email",
        'email.unique' => "Este email já existe",
        'password.required' => "Obrigatório",
        "gender.required" => "Obrigatório",
        "birth_date.required" => "Obrigatório",
        "phone.required" => "Obrigatório",
        'phone.unique' => "Este telefone já existe",
        "password.required" => "Obrigatório",
        'confirmpassword.required' => "Obrigatório",
    ];

    public function render()
    {
        return view('livewire.auth.signup')
            ->layout("components.layouts.auth.app");
    }

    public function save()
    {
        $this->validate();
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
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso'
            ]);
            DB::commit();
            $this->clear();
            $this->dispatch('atrazar_redirect', [
                'path' => '/autenticação',
                'time' => 3000
            ]);
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

    public function check_password(){
        if($this->password != $this->confirmpassword){
            $this->confirmpassword = null;
            $this->validate(
                ["confirmpassword" => "required"], 
                ["confirmpassword.required" => "A confirmação deve ser igual a palavra-passe digitada"]
            );
        }
    }

    public function clear()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->password = null;
        $this->confirmpassword = null;
        $this->gender = null;
        $this->birth_date = null;
        $this->phone = null;
        $this->password = null;
    }
}
