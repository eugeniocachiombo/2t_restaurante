<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\Drink\DrinkComponent;
use App\Livewire\Drink\DrinkStockenterComponent;
use Illuminate\Support\Facades\Route;

Route::get('/bebidas', DrinkComponent::class)->name('drink.component')->middleware(OnlyUserLoged::class);
Route::get('/estoque/entrada', DrinkStockenterComponent::class)->name('drink.stockenter.component')->middleware(OnlyUserLoged::class);
