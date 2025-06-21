<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class SubmitInvoiceComponent extends Component
{
    use WithFileUploads;

    public $selectedOrderId, $orderItems = [];
    public $edit = false;
    public $number, $client_id, $issued_at, $invoice;

    protected $rules = [
        'number' => 'required|string',
        'invoice' => 'required|file|mimes:pdf,jpg,jpeg,png',
    ];

    protected $messages = [
        'number.required'     => 'O número da factura é obrigatório.',
        'number.string'       => 'O número da factura deve ser um texto válido.',

        'invoice.required'    => 'O comprovativo da factura é obrigatório.',
        'invoice.file'        => 'O comprovativo deve ser um arquivo.',
        'invoice.mimes'       => 'O comprovativo deve estar em formato PDF, JPG, JPEG ou PNG.',
    ];


    public function render()
    {
        return view('livewire.order.submit-invoice-component', [
            "invoices" => Order::whereNotNull("invoice")->get(),
        ])
            ->layout('components.layouts.app');
    }

    public function viewOrderItems($orderId)
    {
        $this->selectedOrderId = $orderId;

        $this->orderItems = OrderItem::with(['dish', 'drink'])
            ->where('order_id', $orderId)
            ->get();
    }



    public function submit()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $order = Order::where('number', $this->number)->first();

            if (!$order) {
                $this->dispatch('alerta', [
                    'icon' => 'warning',
                    'title' => 'Factura Inexistente',
                    'html' => 'Nenhum pedido com esse número foi encontrado.',
                ]);
                return;
            }

            $path = $this->invoice->store('invoices', 'public');


            $order->update([
                'attendant_user_id' => Auth::user()->id,
                'invoice' => $path,
                'status' => 'PAGO',
            ]);

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Factura Submetida',
                'html' => 'O comprovativo da factura foi submetido com sucesso!',
            ]);

            $this->reset(['number', 'client_id', 'issued_at', 'invoice']);
            $this->dispatch('close_modal');
            DB::commit();
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
}
