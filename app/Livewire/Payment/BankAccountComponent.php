<?php

namespace App\Livewire\Payment;

use App\Models\BankAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BankAccountComponent extends Component
{

    public $edit = false, $iban;
    public $description, $bk_id;

    protected $rules = [
        'description' => 'required|string|max:255|unique:bank_accounts,description',
        'iban' => 'required|string|max:255',
    ];

    protected $messages = [
        'description.required' => 'O IBAN é obrigatório.',
        'description.unique' => 'Este banco já existe',
        'iban.required' => 'A descrição é obrigatória.',
    ];

    public function render()
    {
        return view('livewire.payment.bank-account-component', [
            "accounts" => BankAccount::all()
        ])
            ->layout('components.layouts.app');
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

            BankAccount::create([
                'iban'   => $this->iban,
                'description'    => $this->description
            ]);

            DB::commit();

            $this->resetForm();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação Realizada com Sucesso',
            ]);

            $this->dispatch("close_modal");
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage(), $th->getLine());
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
        $this->edit = true;

        $bk = BankAccount::findOrFail($id);

        $this->bk_id = $bk->id;
        $this->iban = $bk->iban;
        $this->description = $bk->description;
    }


    public function update()
    {
        try {
            $bk = BankAccount::findOrFail($this->bk_id);

            $this->validate([
                'description' => 'required|string|max:255|unique:bank_accounts,description,' . $this->bk_id,
                'iban' => 'required|string|max:255'
            ]);

            $bk->update([
                'iban'   => $this->iban,
                'description'    => $this->description
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
            dd($th->getMessage(), $th->getLine());
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
            BankAccount::findOrFail($id)->delete();

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
            'iban',
            'description',
            'bk_id'
        ]);
    }
}
