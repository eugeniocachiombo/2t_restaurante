<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\Order\MakeOrderComponent;
use App\Livewire\Order\OrderComponent;
use App\Livewire\Order\SubmitInvoiceComponent;
use Illuminate\Support\Facades\Route;

Route::get('/pedidos/lista', OrderComponent::class)->name('order.component')->middleware(OnlyUserLoged::class);
Route::get('/pedidos/fazer', MakeOrderComponent::class)->name('order.make.component')->middleware(OnlyUserLoged::class);
Route::get('/pedidos/submeter/factura', SubmitInvoiceComponent::class)->name('order.submit.invoice.component')->middleware(OnlyUserLoged::class);
