<?php

namespace App\Livewire\Home;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.home.main', [
            "customers" => User::where("access_id", 5)->get(),
            "orders" => Order::all(),
            "dishes" => Dish::all(),
            "drinks" => Drink::all(),
            "monthlySalesAnalysis" => $this->getMonthlySalesAnalysis(),
            "monthlyOrderStatusCounts" => $this->getMonthlyOrderStatusCounts()
        ])->layout("components.layouts.app");
    }

    public function getMonthlyOrderStatusCounts()
    {
        $statuses = ['PENDENTE', 'PAGO', 'CANCELADO', 'RECEBIDO'];
        $year = now()->year;

        // Obtem todos os pedidos do ano atual
        $orders = Order::whereYear('created_at', $year)->get();

        // Identifica os meses que têm pelo menos 1 pedido
        $monthsWithData = $orders->groupBy(function ($order) {
            return (int) $order->created_at->format('m'); // Mês numérico
        })->keys()->sort()->values()->toArray(); // Ex: [1, 2, 4]

        $data = [];
        foreach ($statuses as $status) {
            $data[$status] = [];
            foreach ($monthsWithData as $month) {
                $count = $orders->filter(function ($order) use ($month, $status) {
                    return $order->created_at->month === $month && $order->status === $status;
                })->count();
                $data[$status][] = $count;
            }
        }

        // Também retorna os nomes dos meses para exibição no gráfico
        $monthNames = collect($monthsWithData)->map(function ($month) {
            return \Carbon\Carbon::create()->month($month)->locale('pt_BR')->isoFormat('MMMM');
        })->toArray();

        return [
            'labels' => $monthNames,       // ['janeiro', 'fevereiro', ...]
            'data' => $data                // ['PENDENTE' => [...], ...]
        ];
    }

    public function getMonthlySalesAnalysis()
    {
        $year = now()->year;

        // Buscar pedidos pagos no ano atual com seus itens
        $paidOrders = Order::where('status', 'PAGO')
            ->whereYear('created_at', $year)
            ->with('items')
            ->get();

        // Agrupar pedidos por mês
        $ordersGroupedByMonth = $paidOrders->groupBy(function ($order) {
            return (int) $order->created_at->format('m');
        });

        $monthsWithData = $ordersGroupedByMonth->keys()->sort()->values()->toArray();

        $dishesSales = [];
        $drinksSales = [];

        foreach ($monthsWithData as $month) {
            $ordersInMonth = $ordersGroupedByMonth->get($month);

            // Somar quantidade de pratos (items com dish_id não nulo)
            $dishesTotal = $ordersInMonth->flatMap(function ($order) {
                return $order->items->filter(fn($item) => !is_null($item->dish_id));
            })->sum('quantity');

            // Somar quantidade de bebidas (items com drink_id não nulo)
            $drinksTotal = $ordersInMonth->flatMap(function ($order) {
                return $order->items->filter(fn($item) => !is_null($item->drink_id));
            })->sum('quantity');

            $dishesSales[] = $dishesTotal;
            $drinksSales[] = $drinksTotal;
        }

        $monthNames = collect($monthsWithData)->map(function ($month) {
            return \Carbon\Carbon::create()->month($month)->locale('pt_BR')->isoFormat('MMMM');
        })->toArray();

        return [
            'labels' => $monthNames,
            'dishes' => $dishesSales,
            'drinks' => $drinksSales
        ];
    }
}
