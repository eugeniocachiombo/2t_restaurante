<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class OrderComponent extends Component
{
    public $edit;
    public $orderItems = [];
    public $selectedOrderId;

    // Campos do pedido para edição (adapte conforme seus campos no form)
    public $description, $type, $status;

    public function render()
    {
        return view('livewire.order.order-component', [
            'orders' => $this->getOrders(),
        ])->layout('components.layouts.app');
    }

    public function getOrders()
    {
        if (Gate::allows("cliente")) {
            return Order::where("customer_user_id", Auth::id())->get();
        } else {
            return Order::all();
        }
    }

    public function viewOrderItems($orderId)
    {
        $this->selectedOrderId = $orderId;

        $this->orderItems = OrderItem::with(['dish', 'drink'])
            ->where('order_id', $orderId)
            ->get();
    }

    public function setData($id)
    {
        $this->edit = Order::findOrFail($id);

        $this->selectedOrderId = $id;
        $this->description = $this->edit->description;
        $this->type = $this->edit->type;
        $this->status = $this->edit->status;

        // Exibe o modal via JS (caso não esteja automático)
        $this->dispatch('openModal', ['id' => 'modal-add']);
    }

    public function update()
    {
        $this->validate([
            'description' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        if (!$this->edit) return;

        try {
            $this->edit->update([
                'description' => $this->description,
                'type' => $this->type,
                'status' => $this->status,
            ]);

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Atualizado',
                'html' => 'Pedido atualizado com sucesso.',
            ]);

            $this->dispatch('close_modal');

        } catch (\Exception $e) {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Erro ao atualizar o pedido.',
            ]);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            OrderItem::where('order_id', $id)->delete();
            Order::findOrFail($id)->delete();

            DB::commit();

            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            $this->dispatch('alerta', [
                'icon' => 'error',
                'title' => 'Erro',
                'html' => 'Erro ao excluir o pedido.',
            ]);
        }
    }
}
