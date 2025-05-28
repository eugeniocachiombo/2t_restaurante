<?php

namespace App\Livewire\Home;

use App\Models\Dish;
use App\Models\Drink;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.home.main', [
            "customers" => User::where("access_id", 5)->get(),
            "orders" => $this->getOrders(),
            "dishes" => $this->getDishes(),
            "drinks" => $this->getDrinks(),
            "monthlySalesAnalysis" => $this->getMonthlySalesAnalysis(),
            "monthlyOrderStatusCounts" => $this->getMonthlyOrderStatusCounts()
        ])->layout("components.layouts.app");
    }

    public function getOrders()
    {

        $user = Auth::user();
        $query = [];

        if (Gate::allows("admin") || Gate::allows("supervisor")) {
            $query = Order::all();
        } else if (Gate::allows("cliente")) {
            $query = Order::where("customer_user_id", $user->id)->get();
        } else if (Gate::allows("atendente")) {
            $query = Order::where("attendant_user_id", $user->id)->get();
        }

        return $query;
    }

    public function getDishes()
    {

        $user = Auth::user();
        $query = [];

        if (Gate::allows("admin") || Gate::allows("supervisor") || Gate::allows("atendente")) {
            $query = Dish::all();
        } else if (Gate::allows("cliente")) {
            $query = Dish::select("dishes.*")
                ->join("order_items", "order_items.dish_id", "dishes.id")
                ->join("orders", "orders.id", "order_items.order_id")
                ->where('orders.status', 'PAGO')
                ->where('orders.customer_user_id', $user->id)
                ->get();
        } else if (Gate::allows("cozinheiro")) {
            $query = Dish::where("user_id", $user->id)->get();
        }

        return $query;
    }

    public function getDrinks()
    {

        $user = Auth::user();
        $query = [];

        if (Gate::allows("admin") || Gate::allows("supervisor")) {
            $query = Drink::all();
        } else if (Gate::allows("cliente")) {
            $query = Drink::select("drinks.*")
                ->join("order_items", "order_items.dish_id", "drinks.id")
                ->join("orders", "orders.id", "order_items.order_id")
                ->where('orders.status', 'PAGO')
                ->where('orders.customer_user_id', $user->id)
                ->get();
        } else {
            $query = Drink::where("user_id", $user->id)->get();
        }

        return $query;
    }

    public function getMonthlyOrderStatusCounts()
    {
        $statuses = ['PENDENTE', 'PAGO', 'CANCELADO', 'RECEBIDO'];
        $year = now()->year;
        $user = Auth::user();

        $query = Order::whereYear('created_at', $year);

        if (Gate::allows("cliente")) {
            $query->where('customer_user_id', $user->id);
        } else if (Gate::allows("atendente")) {
            $query->where('attendant_user_id', $user->id);
        }

        $orders = $query->get();

        $monthsWithData = $orders->groupBy(function ($order) {
            return (int) $order->created_at->format('m');
        })->keys()->sort()->values()->toArray();

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


        $monthNames = collect($monthsWithData)->map(function ($month) {
            return \Carbon\Carbon::create()->month($month)->locale('pt_BR')->isoFormat('MMMM');
        })->toArray();

        return [
            'labels' => $monthNames,
            'data' => $data
        ];
    }

    public function getMonthlySalesAnalysis()
    {
        $user = Auth::user();
        $year = now()->year;


        $query = Order::where('status', 'PAGO')
            ->whereYear('created_at', $year);

        if (Gate::allows("cliente")) {
            $query->where('customer_user_id', $user->id);
        } else if (Gate::allows("atendente")) {
            $query->where('attendant_user_id', $user->id);
        }

        $paidOrders = $query->with('items')
            ->get();


        $ordersGroupedByMonth = $paidOrders->groupBy(function ($order) {
            return (int) $order->created_at->format('m');
        });

        $monthsWithData = $ordersGroupedByMonth->keys()->sort()->values()->toArray();

        $dishesSales = [];
        $drinksSales = [];

        foreach ($monthsWithData as $month) {
            $ordersInMonth = $ordersGroupedByMonth->get($month);


            $dishesTotal = $ordersInMonth->flatMap(function ($order) {
                return $order->items->filter(fn($item) => !is_null($item->dish_id));
            })->sum('quantity');


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
