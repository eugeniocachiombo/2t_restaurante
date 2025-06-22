<?php

namespace App\Livewire\Home;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Livewire\Component;

class NotificationModal extends Component
{
    public function render()
    {
        return view('livewire.home.notification-modal');
    }

    public function confirm($user_id, $notify)
    {
        try {

            DB::beginTransaction();
            $user = User::find($user_id);
            $notification = $user->unreadNotifications->find($notify["id"]);
            $orderId = $notification['data']['order_id'];

            $order = Order::find($notification["data"]['order_id']);
            $order->update([
                'attendant_user_id' => Auth::user()->id,
                'status' => 'PAGO',
            ]);
            DB::table('notifications')
                ->where('type', $notification['type'])
                ->where('read_at', null)
                ->whereJsonContains('data->order_id', $orderId)
                ->update(['read_at' => now()]);

            if ($user->access_id != 5) {
                $custumerId = $notification['data']['customer_user_id'];
                $custumer = User::find($custumerId);
                $custumer->notify(new OrderNotification([
                    'order_id' => $orderId,
                    'description' => 'O seu pedido foi processado.',
                ]));
            }


            DB::commit();
            $this->dispatch('alerta', [
                'icon' => 'success',
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Erro',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }
}
