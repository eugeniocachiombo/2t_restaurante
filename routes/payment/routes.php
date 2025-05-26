<?php


use App\Livewire\Payment\PaymentReceiptComponent;
use Illuminate\Support\Facades\Route;

Route::get('/recibo/pagamento', PaymentReceiptComponent::class);

