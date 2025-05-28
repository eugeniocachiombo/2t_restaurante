<?php

use App\Livewire\Payment\BankAccountComponent;
use Illuminate\Support\Facades\Route;

Route::get('/contas/adicionar', BankAccountComponent::class)->name("payment.account");

