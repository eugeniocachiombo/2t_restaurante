<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\Drink\DrinkComponent;
use Illuminate\Support\Facades\Route;

Route::get('/bebidas', DrinkComponent::class)->name('drink.component')->middleware(OnlyUserLoged::class);
