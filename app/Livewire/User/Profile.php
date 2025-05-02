<?php

namespace App\Livewire\User;

use App\Models\Address;
use App\Models\DateFmt;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Profile extends Component
{
    public $user, $tab;
    public $first_name, $last_name, $gender,
    $birth_date, $email, $phone;
    public $nif, $province_id, $municipality_id, $address_id;
    public $provinces = [], $municipalities = [], $addresses = [];
    public $oldpassword, $newpassword, $confirmpassword;

    protected $rules = [
        "first_name" => "required|string",
        "last_name" => "required|string",
        'email' => "required|email",
        "gender" => "required",
        "birth_date" => "required",
        "phone" => "required",
    ];

    protected $messages = [
        "first_name.required" => "Obrigatório",
        "first_name.string" => "Apenas letras",
        "last_name.required" => "Obrigatório",
        "last_name.string" => "Apenas letras",
        'email.required' => "Obrigatório",
        'email.email' => "Apenas email",
        //'email.unique' => "Este email já existe",
        "gender.required" => "Obrigatório",
        "birth_date.required" => "Obrigatório",
        "phone.required" => "Obrigatório",
        //'phone.unique' => "Este telefone já existe",
    ];

    public function mount()
    {
        $this->tab = "profile_section";
        $this->provinces = Province::all();
        $this->user = Auth::user();
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->gender = $this->user->gender;
        $this->birth_date = $this->user->birth_date;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->nif = $this->user->nif;
        $this->address_id = $this->user->address_id;
    }

    public function render()
    {
        return view('livewire.user.profile')
            ->layout("components.layouts.app");
    }

    public function set_tab($tab){
        $this->tab = $tab;
    }

    public function get_local(){

        if($this->province_id){
            $this->municipalities = Municipality::where("province_id", $this->province_id)->get();
        }

        if($this->municipality_id && $this->province_id){
            $this->addresses = Address::where("municipality_id", $this->municipality_id)
            ->where("province_id", $this->province_id)->get();
        }
    }

    public function format_birth_date($birth_date)
    {
        $date = new DateFmt();
        return $date->format_date_angola($birth_date);
    }

    public function check_password(){
        
        $isTrue = Hash::check($this->oldpassword, $this->user->password);
        
        if (!$isTrue) {
            $this->oldpassword = null;
            $this->validate(
                ["oldpassword" => "required"], 
                ["oldpassword.required" => "Palavra-passe digitada é inválida"]
            );
        }

        if($this->confirmpassword != $this->newpassword){
            $this->confirmpassword = null;
            $this->validate(
                ["confirmpassword" => "required"], 
                ["confirmpassword.required" => "A confirmação deve ser igual a nova palavra-passe digitada"]
            );
        }
    }

    public function change_password()
    {
        $this->validate(
            [
                "oldpassword" => "required",
                "newpassword" => "required",
                "confirmpassword" => "required",
            ], 
            [
                "oldpassword.required" => "Obrigatório",
                "newpassword.required" => "Obrigatório",
                "confirmpassword.required" => "Obrigatório"
            ]
        );
        try {
            DB::beginTransaction();
            User::where("id", Auth::user()->id)->update([
                "password" => $this->newpassword
            ]);
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso'
            ]);
            DB::commit();
            $this->oldpassword = null;
            $this->newpassword = null;
            $this->confirmpassword = null;
        } catch (\Throwable $th) {
            DB::rollBack();
        //    dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Erro ao realizar operação'
            ]);
        }
    }

    public function update()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            User::where("id", Auth::user()->id)->update([
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                'email' => $this->email,
                "gender" => $this->gender,
                "birth_date" => $this->birth_date,
                "phone" => $this->phone,
                "nif" => $this->nif,
                "address_id" => $this->address_id,
            ]);
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso'
            ]);
            DB::commit();
           // $this->clear();
        } catch (\Throwable $th) {
            DB::rollBack();
        //    dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Erro ao realizar operação'
            ]);
        }
    }

    public function clear()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->confirmpassword = null;
        $this->gender = null;
        $this->birth_date = null;
        $this->phone = null;
        $this->nif = null;
        $this->address_id = null;
    }
}
